<?php

namespace App\Decorator;

class SmsNotifierDecorator extends NotifierDecorator
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
        echo sprintf("SMS %s costs %d\n", $message, $this->cost());
    }
}
