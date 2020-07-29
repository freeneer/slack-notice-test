<?php

return [
    // Webhook URL
    'url' => env('SLACK_URL'),


    // チャンネル設定
    'default' => 'work',

    'channels' => [
        'work' => [
            'username' => '作業通知',
            'icon' => ':face_with_rolling_eyes:',
            'channel' => 'notice-work',
        ],
        'error' => [
            'username' => 'エラー通知',
            'icon' => ':scream:',
            'channel' => 'notice-error',
        ],
    ],
];