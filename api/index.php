<?php

declare(strict_types=1);

// Initialize writable storage directories in /tmp for Vercel Serverless environment
$storageDirs = [
    '/tmp/storage/app/public',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/views',
    '/tmp/storage/logs',
];

foreach ($storageDirs as $dir) {
    if (! is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// Ensure SQLite database file exists in /tmp
if (! file_exists('/tmp/database.sqlite')) {
    touch('/tmp/database.sqlite');
}

// Redirect storage paths and DB to /tmp
putenv('LARAVEL_STORAGE_PATH=/tmp/storage');
$_ENV['LARAVEL_STORAGE_PATH'] = '/tmp/storage';
$_SERVER['LARAVEL_STORAGE_PATH'] = '/tmp/storage';

if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
    $_SERVER['HTTPS'] = 'on';
    putenv('HTTPS=on');
}

putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';
$_SERVER['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';

putenv('DB_DATABASE=/tmp/database.sqlite');
$_ENV['DB_DATABASE'] = '/tmp/database.sqlite';
$_SERVER['DB_DATABASE'] = '/tmp/database.sqlite';

// Fallback for maintenance driver to prevent ArgumentCountError if empty
if (empty($_ENV['APP_MAINTENANCE_DRIVER']) || empty(getenv('APP_MAINTENANCE_DRIVER'))) {
    putenv('APP_MAINTENANCE_DRIVER=file');
    $_ENV['APP_MAINTENANCE_DRIVER'] = 'file';
    $_SERVER['APP_MAINTENANCE_DRIVER'] = 'file';
}

// Ensure APP_KEY is synchronized to putenv, $_ENV and $_SERVER
$appKey = $_ENV['APP_KEY'] ?? $_SERVER['APP_KEY'] ?? getenv('APP_KEY') ?: 'base64:wzxB4LcCtKBHVecAqVuQIduanv87HH+FJ+XOehFN9DY=';
putenv('APP_KEY='.$appKey);
$_ENV['APP_KEY'] = $appKey;
$_SERVER['APP_KEY'] = $appKey;

putenv('APP_DEBUG=false');
$_ENV['APP_DEBUG'] = 'false';
$_SERVER['APP_DEBUG'] = 'false';

// Forward request to Laravel public entrypoint
require __DIR__.'/../public/index.php';
