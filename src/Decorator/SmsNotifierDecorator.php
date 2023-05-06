<?php

namespace App\Decorator;

class SmsNotifierDecorator extends Notifier
{
    protected $notifier;

    public function __construct(Notification $notifier)
    {
        $this->notifier = $notifier;
    }

    public function send(string $message): void
    {
        $this->notifier->send($message);
        echo sprintf("SMS %s\n", $message);
    }
}