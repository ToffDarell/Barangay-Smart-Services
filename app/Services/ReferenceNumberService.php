<?php

namespace App\Services;

use App\Models\CertificateRequest;
use Illuminate\Support\Facades\DB;

class ReferenceNumberService
{
    const CODES = [
        'clearance'          => 'CLR',
        'indigency'          => 'IND',
        'residency'          => 'RES',
        'barangay-id'        => 'BID',
        'ftjs'               => 'FTJ',
        'business-clearance' => 'BUS',
    ];

    public static function generate(string $type): string
    {
        $code = self::CODES[$type] ?? 'REQ';
        $year = now()->year;

        return DB::transaction(function () use ($code, $year) {
            $last = CertificateRequest::whereYear('created_at', $year)
                ->where('reference_number', 'like', "{$code}-{$year}-%")
                ->lockForUpdate()
                ->latest('id')
                ->first();

            if ($last && preg_match('/-(\d+)$/', $last->reference_number, $m)) {
                $sequence = (int) $m[1] + 1;
            } else {
                $sequence = 1;
            }

            return sprintf('%s-%d-%06d', $code, $year, $sequence);
        });
    }
}
