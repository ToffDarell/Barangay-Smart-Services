<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        foreach (['admin', 'staff', 'viewer'] as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        $accounts = [
            [
                'name' => 'Barangay Administrator',
                'email' => 'admin@barangaynorth.test',
                'role' => 'admin',
            ],
            [
                'name' => 'Barangay Staff',
                'email' => 'staff@barangaynorth.test',
                'role' => 'staff',
            ],
            [
                'name' => 'Barangay Viewer',
                'email' => 'viewer@barangaynorth.test',
                'role' => 'viewer',
            ],
        ];

        foreach ($accounts as $account) {
            $user = User::query()->updateOrCreate(
                ['email' => $account['email']],
                [
                    'name' => $account['name'],
                    'password' => Hash::make('password'),
                ],
            );

            $user->syncRoles([$account['role']]);
        }
    }
}
