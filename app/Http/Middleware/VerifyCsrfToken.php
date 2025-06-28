<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * Kalau kamu ingin pengecualian CSRF, tambahkan di array ini.
     */
    protected $except = [
        // Contoh: '/webhook/payment'
    ];
}
