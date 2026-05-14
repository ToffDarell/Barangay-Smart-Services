<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PageController extends Controller
{
    public function landing(): View
    {
        return view('public.landing');
    }

    public function dashboard(): View
    {
        return view('dashboard');
    }

    public function residents(): View
    {
        return view('admin.residents.index');
    }

    public function certificates(): View
    {
        return view('admin.certificates.index');
    }

    public function reports(): View
    {
        return view('admin.reports.index');
    }

    public function announcements(): View
    {
        return view('admin.announcements.index');
    }

    public function users(): View
    {
        return view('admin.users.index');
    }

    public function settingsOfficials(): View
    {
        return view('admin.settings.officials');
    }

    public function settingsPurposeTypes(): View
    {
        return view('admin.settings.purpose-types');
    }

    public function settingsClearanceTypes(): View
    {
        return view('admin.settings.clearance-types');
    }

    public function settingsSystemConfiguration(): View
    {
        return view('admin.settings.system-configuration');
    }

    public function publicServices(): View
    {
        return view('public.services');
    }

    public function publicAnnouncements(): View
    {
        return view('public.announcements');
    }

    public function publicTransparency(): View
    {
        return view('public.transparency');
    }
}
