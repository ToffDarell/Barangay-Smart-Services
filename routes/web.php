<?php

use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicRequestController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'landing'])->name('landing');
Route::get('/services', [PageController::class, 'publicServices'])->name('public.services');
Route::get('/announcements', [PageController::class, 'publicAnnouncements'])->name('public.announcements');
Route::get('/transparency', [PageController::class, 'publicTransparency'])->name('public.transparency');

Route::get('/request', [PublicRequestController::class, 'index'])->name('request.index');
Route::get('/request/{type}', [PublicRequestController::class, 'form'])->name('request.form');
Route::post('/request/{type}', [PublicRequestController::class, 'submit'])->name('request.submit');
Route::get('/confirmation/{reference}', [PublicRequestController::class, 'confirmation'])->name('request.confirmation');
Route::get('/track', [PublicRequestController::class, 'track'])->name('track');
Route::post('/track', [PublicRequestController::class, 'search'])->name('track.search');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
    Route::get('/residents', [PageController::class, 'residents'])->name('residents.index');
    Route::get('/certificates', [PageController::class, 'certificates'])->name('certificates.index');
    Route::get('/reports', [PageController::class, 'reports'])->name('reports.index');
    Route::get('/admin-announcements', [PageController::class, 'announcements'])->name('announcements.index');
    Route::get('/users', [PageController::class, 'users'])->name('users.index');
    Route::get('/settings/officials', [PageController::class, 'settingsOfficials'])->name('settings.officials');
    Route::get('/settings/purpose-types', [PageController::class, 'settingsPurposeTypes'])->name('settings.purpose-types');
    Route::get('/settings/clearance-types', [PageController::class, 'settingsClearanceTypes'])->name('settings.clearance-types');
    Route::get('/settings/system-configuration', [PageController::class, 'settingsSystemConfiguration'])->name('settings.system-configuration');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/certificates', [CertificateController::class, 'index'])->name('certificates.index');
        Route::get('/certificates/export/csv', [CertificateController::class, 'exportCsv'])->name('certificates.export.csv');
        Route::post('/certificates/export/excel', [CertificateController::class, 'exportExcel'])->name('certificates.export.excel');
        Route::get('/certificates/{certificate}', [CertificateController::class, 'show'])->name('certificates.show');
        Route::patch('/certificates/{certificate}/status', [CertificateController::class, 'updateStatus'])->name('certificates.updateStatus');
        Route::get('/certificates/{certificate}/pdf', [CertificateController::class, 'pdf'])->name('certificates.pdf');
        Route::get('/certificates/{certificate}/attachment', [CertificateController::class, 'attachment'])->name('certificates.attachment');
    });
});

require __DIR__.'/auth.php';
