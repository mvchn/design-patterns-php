<?php

namespace App\Factory;

class SmsNotifier implements Notifier
{
    public function send(string $message): void
    {
        echo $message . "\n";
    }
}
