<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangayConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $configs = [
            'barangay_name' => 'North Poblacion',
            'municipality' => 'Maramag',
            'province' => 'Bukidnon',
            'captain_name' => 'Hon. [Actual Captain Name]',
            'contact_number' => '0912-345-6789',
            'email' => 'barangaynorte@maramag.gov.ph',
            'office_hours' => 'Monday - Friday, 8:00 AM - 5:00 PM',
        ];
    }
}
