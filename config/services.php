<?php
/**
 * Конфигурации для интеграций со сторонними сервисами
 * @docs https://github.com/laravel/laravel/blob/11.x/config/services.php
 */

return [
    'dummy_json' => [
        'domain' => env('DUMMY_JSON_DOMAIN'),
        'username' => env('DUMMY_JSON_USERNAME'),
        'password' => env('DUMMY_JSON_PASSWORD'),
    ]
];
