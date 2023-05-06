<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Singleton\Config;
use App\Singleton\ConfigEnvException;

$appConfig = Config::getInstance();

try {
    echo $appConfig->get('APP_ENV') . PHP_EOL;
} catch (ConfigEnvException $e) {
    echo $e->getMessage() . PHP_EOL;
}
