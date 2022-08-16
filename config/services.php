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
    
    'facebook' => [
        'client_id' => '1131823707678665',  //client face của bạn
        'client_secret' => '161067702d6f2b9b66d3bc560931a650',  //client app service face của bạn
        'redirect' => 'https://eshopper.com/shopbanhanglaravel/admin/callback' //callback trả về
    ],

    'google' => [
        'client_id' => '543753519113-4l1sabi6bh7ncl4ht1v2sqcfp2ef277p.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'https://eshopper.com/shopbanhanglaravel/google/callback' 
    ],



];
