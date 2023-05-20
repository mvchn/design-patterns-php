<?php


require_once __DIR__ . '/../vendor/autoload.php';

use App\Factory\SimpleFactory;
use App\Factory\FactoryNotifierException;

$notifierNames = [
    'SMS',
    'Email',
    'Unknown'
];

foreach ($notifierNames as $name) {
    try {
        $notifier = SimpleFactory::createNotifier($name);
        $notifier->send("Test message on {$name}");
    } catch (FactoryNotifierException $e) {
        echo "Error: {$e->getMessage()}\n";
    }
}
