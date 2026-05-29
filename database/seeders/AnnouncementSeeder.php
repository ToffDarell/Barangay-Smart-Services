<?php

namespace Database\Seeders;

use App\Models\Announcement;
use Illuminate\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    public function run(): void
    {
        Announcement::create([
            'title'        => 'Barangay Assembly 2026',
            'body'         => 'All residents are invited to attend the Barangay General Assembly on June 15, 2026 at the Barangay Hall. Discussions on community projects and budget allocation will be held.',
            'category'     => 'Events',
            'is_active'    => true,
            'published_at' => now(),
        ]);

        Announcement::create([
            'title'        => 'Schedule of Free Medical Check-up',
            'body'         => 'In partnership with the Municipal Health Office, a free medical check-up will be conducted on May 30, 2026. Services include blood pressure check, blood sugar test, and general consultation.',
            'category'     => 'Health',
            'is_active'    => true,
            'published_at' => now(),
        ]);

        Announcement::create([
            'title'        => 'Road Closure Advisory',
            'body'         => 'The national road passing through Purok 3 will be closed from 8:00 AM to 5:00 PM on June 2 for road repairs. Kindly take alternate routes.',
            'category'     => 'Advisory',
            'is_active'    => true,
            'published_at' => now(),
        ]);

        Announcement::create([
            'title'        => 'Curfew Reminder for Minors',
            'body'         => 'Minors are reminded to observe the 10:00 PM curfew as per Barangay Ordinance No. 2025-03. Parents and guardians are urged to ensure compliance.',
            'category'     => 'Safety',
            'is_active'    => true,
            'published_at' => now(),
        ]);

        Announcement::create([
            'title'        => 'Registration for Senior Citizen Subsidy',
            'body'         => 'Senior citizens who have not yet registered for the monthly stipend program are encouraged to visit the Barangay Hall on weekdays. Please bring a valid ID.',
            'category'     => 'General',
            'is_active'    => true,
            'published_at' => now(),
        ]);

        Announcement::create([
            'title'        => 'Community Cleanup Drive',
            'body'         => 'Join the quarterly community cleanup drive on June 8. Volunteers will meet at the Barangay Plaza at 6:00 AM. Gloves and garbage bags will be provided.',
            'category'     => 'Events',
            'is_active'    => true,
            'published_at' => now(),
        ]);
    }
}
