<?php

namespace App\Services;

use App\Models\CertificateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CertificateRequestService
{
    public function search(Request $request)
    {
        $query = CertificateRequest::latest();

        if ($search = $request->query('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('reference_number', 'like', "%{$search}%")
                  ->orWhere('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('certificate_type', 'like', "%{$search}%")
                  ->orWhere('purpose', 'like', "%{$search}%")
                  ->orWhere('purok', 'like', "%{$search}%");
            });
        }

        if ($type = $request->query('type')) {
            $query->where('certificate_type', $type);
        }

        if ($status = $request->query('status')) {
            $query->where('status', $status);
        }

        return $query;
    }

    public function getCounts()
    {
        return [
            'totalRequests'  => CertificateRequest::count(),
            'pendingCount'   => CertificateRequest::where('status', 'pending')->count(),
            'processingCount' => CertificateRequest::where('status', 'processing')->count(),
            'readyCount'     => CertificateRequest::where('status', 'ready')->count(),
            'claimedCount'   => CertificateRequest::where('status', 'claimed')->count(),
            'rejectedCount'  => CertificateRequest::where('status', 'rejected')->count(),
        ];
    }

    public function getMonthlyRegistrations(): array
    {
        $driver = DB::connection()->getDriverName();
        $monthExpr = $driver === 'sqlite'
            ? "CAST(strftime('%m', created_at) AS INTEGER) as m"
            : 'MONTH(created_at) as m';

        $monthly = CertificateRequest::selectRaw("{$monthExpr}, COUNT(*) as c")
            ->whereYear('created_at', now()->year)
            ->groupBy('m')
            ->pluck('c', 'm');

        $labels = [];
        $data = [];
        for ($i = 1; $i <= 12; $i++) {
            $labels[] = date('M', mktime(0, 0, 0, $i, 1));
            $data[] = $monthly->get($i, 0);
        }

        return [$labels, $data];
    }

    public function getRequestsByType(): array
    {
        $byType = CertificateRequest::selectRaw('certificate_type, COUNT(*) as c')
            ->groupBy('certificate_type')
            ->pluck('c', 'certificate_type');

        return [
            $byType->keys()->map(fn($v) => ucfirst($v))->toArray(),
            $byType->values()->toArray(),
        ];
    }
}
