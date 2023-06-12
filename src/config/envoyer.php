<?php

declare(strict_types=1);

/*
 * This file is part of the Drewlabs package.
 *
 * (c) Sidoine Azandrew <azandrewdevelopper@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [
    /*
    |--------------------------------------------------------------------------
    | Envoyer Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default envoyer driver used by the application
    |
    */
    'defaults' => [
        'driver' => env('ENVOYER_DEFAULT_DRIVER', 'whatsapp')
    ],

    /*
    |--------------------------------------------------------------------------
    | Envoyer mail configuration
    |--------------------------------------------------------------------------
    |
    | This options define envoyer mail notification driver configurations
    |
    */
    'mail' => [
        'default' => env('MAIL_MAILER', 'smtp'),
        'drivers' => [
            'ses' => [
                'key' => env('AWS_ACCESS_KEY_ID'),
                'secret' => env('AWS_SECRET_ACCESS_KEY'),
                'region' => env('AWS_REGION'),
            ],
            'sendgrid' => [
                'key' => env('SENDGRID_API_KEY', env('MAIL_USERNAME')),
                'secret' => env('SENDGRID_KEY_SECRET', env('MAIL_PASSWORD')),
            ],
            'smtp' => [
                'key' => env('MAIL_USERNAME'),
                'secret' => env('MAIL_PASSWORD'),
                'port' => env('MAIL_PORT'),
                'host' => env('MAIL_HOST'),
            ]
        ],
        'from' => [
            'address' => env('MAIL_SENDER', env('ENVOYER_SENDER_EMAIL')),
            'name' => env('MAIL_SENDER_NAME', env('ENVOYER_SENDER'))
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Envoyer Text message configuration
    |--------------------------------------------------------------------------
    |
    | This options define envoyer text message notification driver configurations
    |
    */
    'sms' => [
        'default' => env('TEXT_MESSAGE_DRIVER', 'twilio'),
        'drivers' => [
            'smpp' => [
                'key' => env('SMPP_API_KEY'),
                'secret' => env('SMPP_KEY_SECRET'),
                'port' => env('SMPP_PORT'),
                'host' => env('SMPP_HOST'),
            ],
            'twilio' => [
                'key' => env('TWILIO_API_KEY'),
                'secret' => env('TWILIO_SECRET_KEY'),
            ],
        ],
        'from' => [
            'name' => env('TEXT_MESSAGE_SENDER_NAME', env('ENVOYER_SENDER'))
        ]
    ],
    /*
    |--------------------------------------------------------------------------
    | Envoyer Social networks configuration
    |--------------------------------------------------------------------------
    |
    | This options define social networks notification driver configurations
    |
    */
    'social' => [
        'default' => env('SOCIAL_MESSAGE_DRIVER', 'whatsapp'),
        'drivers' => [
            'whatsapp' => [
                'key' => env('WHATSAPP_WEB_SDK_API_KEY'),
                'secret' => env('WHATSAPP_WEB_SDK_KEY_SECRET'),
                'port' => env('WHATSAPP_WEB_SDK_PORT'),
                'host' => env('WHATSAPP_WEB_SDK_HOST'),
            ],
        ],
        'from' => [
            'name' => env('TEXT_MESSAGE_SENDER_NAME', env('ENVOYER_SENDER'))
        ]
    ]
];
