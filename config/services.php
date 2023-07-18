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
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'github' => [
        'client_id' => '635f48c7d113a5d780b8',
        'client_secret' => '9572e02d4a2934cd1385103d95d147b50404d99e',
        'redirect' => 'http://127.0.0.1:8000/auth/github/callback',
    ],

    'google' => [
        'client_id' => '807930534033-u20fv4sadscngelgc23lfrod4hm3oh5k.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://127.0.0.1:8000/auth/google/callback/',
    ]

];
