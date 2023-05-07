<?php

namespace App\Factory;

class EmailNotifier implements Notifier
{
    public function send(string $message): void
    {
        echo $message . "\n";
    }
}
