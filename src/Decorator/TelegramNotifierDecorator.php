<?php

namespace App\Decorator;

class TelegramNotifierDecorator extends Notifier implements Notification
{
    protected $notifier;

    public function __construct(Notification $notifier)
    {
        $this->notifier = $notifier;
    }

    public function send(string $message): void
    {
        $this->notifier->send($message);
        echo sprintf("Telegram %s\n", $message);
    }
}
