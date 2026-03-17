<?php

// Make sure you're in the Laravel project root directory
// Include the Laravel autoloader
require __DIR__.'/vendor/autoload.php';

// Create a new instance of Laravel's application
$app = require_once __DIR__.'/bootstrap/app.php';

// Clear the application cache
$app->make(Illuminate\Contracts\Console\Kernel::class)->call('cache:clear');
$app->make(Illuminate\Contracts\Console\Kernel::class)->call('view:clear');
$app->make(Illuminate\Contracts\Console\Kernel::class)->call('config:clear');
$app->make(Illuminate\Contracts\Console\Kernel::class)->call('route:clear');

echo 'Cache cleared!<br><br>';

// Use the Artisan facade to run the command
Artisan::call('storage:link');

// Output a success message
echo "Symbolic link created successfully!";
?>