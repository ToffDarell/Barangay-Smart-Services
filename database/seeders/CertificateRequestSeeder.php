<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CertificateRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run(): void
    {
        // Grab resident data to reuse for requestor information
        $residents = \Illuminate\Support\Facades\DB::table('residents')->get();

        $typeMap = [
            'CLR' => 'Barangay Clearance',
            'IND' => 'Certificate of Indigency',
            'RES' => 'Certificate of Residency',
            'BID' => 'Business Clearance',
            'FTJ' => 'First Time Job Seeker',
        ];

        $purposes = [
            'Local Employment', 'Medical Assistance', 'Scholarship', 'Business Permit',
            'Job Application', 'Community Service', 'Travel',
        ];

        // Status distribution as requested
        $statusDistribution = [
            'pending'    => 5,
            'processing' => 3,
            'ready'      => 3,
            'claimed'    => 3,
            'rejected'   => 1,
        ];

        $requests = [];
        $counter = 1;
        $typeCodes = array_keys($typeMap);
        foreach ($statusDistribution as $status => $count) {
            for ($i = 0; $i < $count; $i++) {
                $resident = $residents->random();
                $typeCode = $typeCodes[array_rand($typeCodes)];
                $certificateType = $typeMap[$typeCode];
                $refNumber = $typeCode . '-' . date('Y') . '-' . str_pad($counter, 6, '0', STR_PAD_LEFT);
                $fullName = trim($resident->first_name . ' ' . ($resident->middle_name ?? '') . ' ' . $resident->last_name);
                $purpose = $purposes[array_rand($purposes)];

                $requests[] = [
                    'reference_number' => $refNumber,
                    'type_code'        => $typeCode,
                    'certificate_type' => $certificateType,
                    'first_name'       => $resident->first_name,
                    'middle_name'      => $resident->middle_name,
                    'last_name'        => $resident->last_name,
                    'full_name'        => $fullName,
                    'date_of_birth'    => $resident->date_of_birth,
                    'gender'           => $resident->gender,
                    'civil_status'     => $resident->civil_status,
                    'address'          => $resident->address,
                    'purok'            => $resident->purok,
                    'contact_number'   => $resident->contact_number,
                    'purpose'          => $purpose,
                    'valid_id_path'    => null,
                    'status'           => $status,
                    'rejection_reason' => $status === 'rejected' ? 'Incomplete documents' : null,
                    'processed_by'     => null,
                    'claimed_at'       => $status === 'claimed' ? now() : null,
                    'created_at'       => now(),
                    'updated_at'       => now(),
                ];
                $counter++;
            }
        }

        \Illuminate\Support\Facades\DB::table('certificate_requests')->insert($requests);
    }
}
