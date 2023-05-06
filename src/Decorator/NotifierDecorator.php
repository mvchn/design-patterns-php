<?php

namespace App\Decorator;

class NotifierDecorator extends Notifier
{
    public function send(string $message): void
    {
        echo $message . "\n";
    }
}
