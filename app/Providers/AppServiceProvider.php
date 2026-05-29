<?php

namespace App\Providers;

use App\Models\CertificateRequest;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('layouts.app', function ($view) {
            $notifications = CertificateRequest::latest()->take(10)->get()->map(function ($cert) {
                $messages = [
                    'pending'    => 'submitted a new request.',
                    'processing' => 'request is now being processed.',
                    'ready'      => 'request is ready for claiming.',
                    'claimed'    => 'request has been claimed.',
                    'rejected'   => 'request was rejected.',
                ];

                return (object) [
                    'title'   => ucfirst($cert->certificate_type) . ' Request',
                    'message' => "{$cert->full_name} {$messages[$cert->status]}",
                    'time'    => $cert->updated_at->diffForHumans(),
                    'url'     => route('admin.certificates.show', $cert->id),
                ];
            });

            $unreadCount = CertificateRequest::where('status', 'pending')->count();

            $view->with(compact('notifications', 'unreadCount'));
        });
    }
}
