<?php

namespace App\Decorator;

class TelegramNotifierDecorator extends NotifierDecorator implements Notification
{
    protected $notifier;

    public function __construct(Notification $notifier)
    {
        $this->notifier = $notifier;
    }

    public function cost(): int
    {
        return $this->notifier->cost() + 1;
    }

    public function send(string $message): void
    {
        $this->notifier->send($message);
        echo sprintf("Telegram %s costs %d\n", $message, $this->cost());
    }
}
