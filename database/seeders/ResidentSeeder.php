<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Generate 20 resident records with realistic Filipino data
        $firstNames = [
            'Juan', 'Maria', 'Jose', 'Ana', 'Pedro', 'Luz', 'Rosa', 'Carlos', 'María', 'Antonio',
            'Catherine', 'Isabel', 'Manuel', 'Sofia', 'Julio', 'Nina', 'Roberto', 'Gloria', 'Rogelio', 'Patricia'
        ];
        $lastNames = [
            'Dela Cruz', 'Santos', 'Reyes', 'Gomez', 'Bautista', 'Silva', 'Torres', 'Luna', 'Ramos', 'Alvarez',
            'Fernandez', 'Martinez', 'Garcia', 'Domingo', 'Mendoza', 'Diaz', 'Sanchez', 'Villanueva', 'Cruz', 'Salazar'
        ];
        $civilStatuses = ['Single', 'Married', 'Widowed', 'Divorced', 'Separated'];
        $genders = ['Male', 'Female'];
        $puroks = ['Purok 1', 'Purok 2', 'Purok 3', 'Purok 4', 'Purok 5', 'Purok 6'];

        $residents = [];
        for ($i = 1; $i <= 20; $i++) {
            $first = $firstNames[array_rand($firstNames)];
            $last = $lastNames[array_rand($lastNames)];
            $dob = \Carbon\Carbon::now()->subYears(rand(18, 80))->format('Y-m-d');
            $gender = $genders[array_rand($genders)];
            $civil = $civilStatuses[array_rand($civilStatuses)];
            $purok = $puroks[array_rand($puroks)];
            $address = "{$purok}, Barangay North Poblacion, Maramag, Bukidnon";
            $contact = '09' . str_pad(random_int(0, 999999999), 9, '0', STR_PAD_LEFT);
            $isVoter = (bool)random_int(0, 1);

            $residents[] = [
                'resident_id'   => 'RES-' . date('Y') . '-' . str_pad($i, 6, '0', STR_PAD_LEFT),
                'first_name'    => $first,
                'middle_name'   => null,
                'last_name'     => $last,
                'date_of_birth' => $dob,
                'gender'        => $gender,
                'civil_status'  => $civil,
                'address'       => $address,
                'purok'         => $purok,
                'contact_number'=> $contact,
                'is_voter'      => $isVoter,
                'status'        => 'active',
                'created_at'    => now(),
                'updated_at'    => now(),
            ];
        }

        \Illuminate\Support\Facades\DB::table('residents')->insert($residents);
    }
}
