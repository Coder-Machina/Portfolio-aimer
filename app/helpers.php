<?php

declare(strict_types=1);

use App\Models\Setting;

if (! function_exists('setting')) {
    /**
     * Retrieve a cached global setting or return default value.
     */
    function setting(?string $key = null, mixed $default = null): mixed
    {
        static $settings = null;

        if ($settings === null) {
            $settings = Setting::query()->first();
        }

        if ($key === null) {
            return $settings;
        }

        return $settings?->{$key} ?? $default;
    }
}
