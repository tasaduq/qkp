<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'facebook' => [
        'client_id' => '763477780922965',
        'client_secret' => 'e5976e1f739de5d75f44f5db8a22e876',
        'redirect' => 'http://localhost/qkp/public/login/facebook/callback',
    ],

    'google' => [
        'client_id' => '438283219792-rdnkdhbs3e9f729tlsuom5tvem9q3ujh.apps.googleusercontent.com',
        'client_secret' => 'e2APL3R0XWgY09egNOV4L_uj',
        'redirect' => 'http://localhost/qkp/public/login/google/callback',
    ],

];
