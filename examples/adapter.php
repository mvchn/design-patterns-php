<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Adapter\{Notification, EmailNotification, TelegramNotification};
use App\Adapter\TelegramApi;

function run(Notification $notification): void
{
    echo $notification->send("A new order", "There is a new order #123");
}

$notification = new EmailNotification("test@example.com");
run($notification);
echo "\n\n";


$telegramApi = new TelegramApi("12345678", "XXXXXXXX");
$notification = new TelegramNotification($telegramApi, "1234");
run($notification);