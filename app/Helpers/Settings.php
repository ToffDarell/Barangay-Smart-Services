<?php

namespace App\Helpers;

use App\Models\BarangayConfiguration;
use Illuminate\Support\Facades\Cache;

class Settings
{
    public static function get(string $key, $default = null)
    {
        return Cache::remember("setting_{$key}", 3600, function () use ($key, $default) {
            return BarangayConfiguration::where('key', $key)->value('value') ?? $default;
        });
    }

    public static function set(string $key, $value): void
    {
        BarangayConfiguration::updateOrCreate(['key' => $key], ['value' => $value]);
        Cache::forget("setting_{$key}");
    }
}
