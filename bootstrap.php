<?php

require_once __DIR__ . '/vendor/autoload.php';

$configPath = __DIR__ . '/config.php';
if (! file_exists($configPath)) {
    die('Please create config.php from config.example.php and set database credentials.' . PHP_EOL);
}

require_once $configPath;
