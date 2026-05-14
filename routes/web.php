<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'landing'])->name('landing');
Route::get('/services', [PageController::class, 'publicServices'])->name('public.services');
Route::get('/announcements', [PageController::class, 'publicAnnouncements'])->name('public.announcements');
Route::get('/transparency', [PageController::class, 'publicTransparency'])->name('public.transparency');

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
});

require __DIR__.'/auth.php';
