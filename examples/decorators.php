<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Decorator\{EmailNotifierDecorator, NotifierDecorator, SmsNotifierDecorator, TelegramNotifierDecorator};

$first = new NotifierDecorator();
$next1 = new EmailNotifierDecorator($first);
$next2 = new SmsNotifierDecorator($next1);
$next3 = new TelegramNotifierDecorator($next2);

$next3->send('Notification');