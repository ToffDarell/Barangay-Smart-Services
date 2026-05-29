<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Settings;
use App\Http\Controllers\Controller;
use App\Models\CertificateRequest;
use App\Services\CertificateRequestService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class CertificateController extends Controller
{
    public function __construct(
        protected CertificateRequestService $certificateService
    ) {}

    public function index(Request $request)
    {
        $query = $this->certificateService->search($request);
        $counts = $this->certificateService->getCounts();

        $status = $request->query('status');
        $requests = $status
            ? $query->where('status', $status)->paginate(10)->withQueryString()
            : $query->paginate(10)->withQueryString();

        return view('admin.certificates.index', [
            'requests'        => $requests,
            ...$counts,
        ]);
    }

    public function exportCsv(Request $request)
    {
        $requests = $this->certificateService->search($request)->get();
        $filename = 'certificate-requests-' . now()->format('Y-m-d-His') . '.csv';

        $headers = [
            'Content-Type'        => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function () use ($requests) {
            $handle = fopen('php://output', 'w');
            fwrite($handle, "\xEF\xBB\xBF");
            fputcsv($handle, ['REF NO.', 'DATE REQUESTED', 'REQUESTOR', 'DOCUMENT TYPE', 'PURPOSE', 'STATUS']);

            foreach ($requests as $r) {
                fputcsv($handle, [
                    $r->reference_number,
                    $r->created_at->format('Y-m-d'),
                    $r->full_name,
                    $r->certificate_type,
                    $r->purpose,
                    ucfirst($r->status),
                ]);
            }

            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function exportExcel(Request $request)
    {
        $requests = $this->certificateService->search($request)->get();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ['REF NO.', 'DATE REQUESTED', 'REQUESTOR', 'DOCUMENT TYPE', 'PURPOSE', 'STATUS'];
        $sheet->fromArray($headers, null, 'A1');

        $row = 2;
        foreach ($requests as $r) {
            $sheet->setCellValue("A{$row}", $r->reference_number);
            $sheet->setCellValue("B{$row}", $r->created_at->format('Y-m-d'));
            $sheet->setCellValue("C{$row}", $r->full_name);
            $sheet->setCellValue("D{$row}", $r->certificate_type);
            $sheet->setCellValue("E{$row}", $r->purpose);
            $sheet->setCellValue("F{$row}", ucfirst($r->status));
            $row++;
        }

        foreach (range('A', 'F') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'certificate-requests-' . now()->format('Y-m-d-His') . '.xlsx';

        $tempFile = tempnam(sys_get_temp_dir(), 'export');
        $writer->save($tempFile);

        return response()->download($tempFile, $filename, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ])->deleteFileAfterSend(true);
    }

    public function show(CertificateRequest $certificate)
    {
        $cert = $certificate;
        return view('admin.certificates.show', compact('cert'));
    }

    public function pdf(CertificateRequest $certificate)
    {
        $config = [
            'barangay_name' => Settings::get('barangay_name', 'North Poblacion'),
            'municipality'  => Settings::get('municipality', 'Maramag'),
            'province'      => Settings::get('province', 'Bukidnon'),
            'captain_name'  => Settings::get('captain_name', 'Hon. Barangay Captain'),
        ];

        $pdf = Pdf::loadView('pdf.certificate', [
            'cert'   => $certificate,
            'config' => $config,
        ])->setPaper('letter', 'portrait');

        return $pdf->stream("{$certificate->reference_number}.pdf");
    }

    public function attachment(CertificateRequest $certificate)
    {
        if (!$certificate->valid_id_path || !Storage::disk('local')->exists($certificate->valid_id_path)) {
            return back()->with('error', 'No attachment found.');
        }

        return Storage::disk('local')->response($certificate->valid_id_path);
    }

    public function updateStatus(Request $request, CertificateRequest $certificate)
    {
        $data = $request->validate([
            'status'           => 'required|in:processing,ready,claimed,rejected',
            'rejection_reason' => 'required_if:status,rejected|nullable|string',
        ]);

        $certificate->update([
            'status'           => $data['status'],
            'rejection_reason' => $data['rejection_reason'] ?? null,
            'processed_by'     => auth()->id(),
            'claimed_at'       => $data['status'] === 'claimed' ? now() : null,
        ]);

        return back()->with('success', 'Status updated successfully.');
    }
}
