<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\CertificateRequest;
use App\Models\ClearanceType;
use App\Models\Official;
use App\Models\PurposeType;
use App\Models\Resident;
use App\Helpers\Settings;
use App\Services\CertificateRequestService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PageController extends Controller
{
    public function __construct(
        protected CertificateRequestService $certificateService
    ) {}

    public function landing(): View
    {
        return view('public.landing', [
            'residentCount' => Resident::count(),
            'totalRequests' => CertificateRequest::count(),
        ]);
    }

    public function dashboard(): View
    {
        $counts = $this->certificateService->getCounts();
        [$chartLabels, $chartData] = $this->certificateService->getMonthlyRegistrations();
        [$typeLabels, $typeData] = $this->certificateService->getRequestsByType();
        $typeColors = ['#A61C1C', '#734A12', '#F2C11D', '#2563EB', '#059669', '#D97706'];

        return view('dashboard', [
            ...$counts,
            'chartLabels'     => $chartLabels,
            'chartData'       => $chartData,
            'typeLabels'      => $typeLabels,
            'typeData'        => $typeData,
            'typeColors'      => $typeColors,
            'recentRequests'  => CertificateRequest::latest()->take(5)->get(),
            'recentResidents' => Resident::latest()->take(5)->get(),
        ]);
    }

    public function residents(): View
    {
        $residents = Resident::latest()->paginate(15);
        return view('admin.residents.index', compact('residents'));
    }

    public function certificates(Request $request): View
    {
        $query = $this->certificateService->search($request);
        $counts = $this->certificateService->getCounts();

        $status = $request->query('status');
        $requests = $status
            ? $query->where('status', $status)->paginate(10)->withQueryString()
            : $query->paginate(10)->withQueryString();

        return view('admin.certificates.index', [
            'requests'        => $requests,
            'totalCount'      => $counts['total'],
            'pendingCount'    => $counts['pending'],
            'processingCount' => $counts['processing'],
            'readyCount'      => $counts['ready'],
            'claimedCount'    => $counts['claimed'],
        ]);
    }

    public function reports(): View
    {
        $counts = $this->certificateService->getCounts();
        [$chartLabels, $chartData] = $this->certificateService->getMonthlyRegistrations();
        [$typeLabels, $typeData] = $this->certificateService->getRequestsByType();
        $typeColors = ['#A61C1C', '#734A12', '#F2C11D', '#2563EB', '#059669', '#D97706'];

        return view('admin.reports.index', [
            'approvedCount'  => CertificateRequest::whereIn('status', ['processing', 'ready'])->count(),
            'releasedCount'  => $counts['claimedCount'],
            'rejectedCount'  => $counts['rejectedCount'],
            'totalRequests'  => $counts['totalRequests'],
            'chartLabels'    => $chartLabels,
            'chartData'      => $chartData,
            'typeLabels'     => $typeLabels,
            'typeData'       => $typeData,
            'typeColors'     => $typeColors,
            'totalTypeCount' => array_sum($typeData),
            'recentRequests' => CertificateRequest::latest()->take(10)->get(),
        ]);
    }

    public function announcements(): View
    {
        $announcements = Announcement::latest()->paginate(10);
        return view('admin.announcements.index', compact('announcements'));
    }

    public function users(): View
    {
        return view('admin.users.index');
    }

    public function settingsOfficials(): View
    {
        $officials = Official::ordered()->get();
        return view('admin.settings.officials', compact('officials'));
    }

    public function settingsPurposeTypes(): View
    {
        $purposes = PurposeType::latest()->get();
        return view('admin.settings.purpose-types', compact('purposes'));
    }

    public function settingsClearanceTypes(): View
    {
        $clearanceTypes = ClearanceType::latest()->get();
        return view('admin.settings.clearance-types', compact('clearanceTypes'));
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
        $announcements = Announcement::where('is_active', true)
            ->latest('published_at')
            ->paginate(12);

        return view('public.announcements', [
            'announcements' => $announcements,
            'residentCount' => Resident::count(),
            'totalRequests' => CertificateRequest::count(),
        ]);
    }

    public function publicTransparency(): View
    {
        $officials = Official::ordered()->get();
        $config = [
            'barangay_name' => Settings::get('barangay_name', 'North Poblacion'),
            'municipality'  => Settings::get('municipality', 'Maramag'),
            'province'      => Settings::get('province', 'Bukidnon'),
            'captain_name'  => Settings::get('captain_name', 'Hon. Barangay Captain'),
            'contact'       => Settings::get('contact_number', 'N/A'),
            'email'         => Settings::get('email', 'N/A'),
            'office_hours'  => Settings::get('office_hours', 'Monday - Friday, 8:00 AM - 5:00 PM'),
        ];

        return view('public.transparency', [
            'officials'     => $officials,
            'config'        => $config,
            'residentCount' => Resident::count(),
            'totalRequests' => CertificateRequest::count(),
        ]);
    }
}
