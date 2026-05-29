<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmitCertificateRequest;
use App\Models\CertificateRequest;
use App\Services\ReferenceNumberService;
use Illuminate\Http\Request;

class PublicRequestController extends Controller
{
    public function index()
    {
        return view('public.request-index');
    }

    public function form(string $type)
    {
        $types = ReferenceNumberService::CODES;
        abort_unless(array_key_exists($type, $types), 404);
        return view('public.request-form', compact('type'));
    }

    public function confirmation(string $reference)
    {
        $cert = CertificateRequest::where('reference_number', $reference)->firstOrFail();
        return view('public.request-confirmation', compact('cert'));
    }

    public function track()
    {
        return view('public.track');
    }

    public function search(Request $request)
    {
        $data = $request->validate(['reference_number' => 'required|string']);

        $cert = CertificateRequest::where(
            'reference_number',
            strtoupper($data['reference_number'])
        )->first();

        return view('public.track', [
            'cert'     => $cert,
            'searched' => true,
        ]);
    }

    public function submit(SubmitCertificateRequest $request, string $type)
    {
        $validated = $request->validated();
        $referenceNumber = ReferenceNumberService::generate($type);

        $validIdPath = null;
        if ($request->hasFile('valid_id')) {
            $validIdPath = $request->file('valid_id')->store('valid-ids', 'local');
        }

        CertificateRequest::create([
            'reference_number'   => $referenceNumber,
            'type_code'          => ReferenceNumberService::CODES[$type] ?? 'REQ',
            'certificate_type'   => $type,
            'first_name'         => $validated['first_name'],
            'middle_name'        => $validated['middle_name'] ?? null,
            'last_name'          => $validated['last_name'],
            'date_of_birth'      => $validated['date_of_birth'],
            'civil_status'       => $validated['civil_status'],
            'gender'             => $validated['gender'],
            'address'            => $validated['address'],
            'purok'              => $validated['purok'],
            'contact_number'     => $validated['contact_number'],
            'purpose'            => $validated['purpose'],
            'valid_id_path'      => $validIdPath,
            'status'             => 'pending',
        ]);

        return redirect()->route('request.confirmation', $referenceNumber);
    }
}
