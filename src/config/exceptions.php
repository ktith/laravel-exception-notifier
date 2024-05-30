<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Exception Enabled
    |--------------------------------------------------------------------------
    |
    | Enable/Disable exception notifications
    |
    */
    'exception_notify_enabled' => env('EXCEPTION_NOTIFY_ENABLED', true),


    /*
    |--------------------------------------------------------------------------
    | Telegram Erorr
    |--------------------------------------------------------------------------
    |
    | Enable/Disable exception notifications
    |
    */
    'telegram-error' => [
        'token'     => env('TELEGRAM_ERROR_BOT_TOKEN'),
        'chat_id'   => env('TELEGRAM_ERROR_CHAT_ID')
    ]

];
