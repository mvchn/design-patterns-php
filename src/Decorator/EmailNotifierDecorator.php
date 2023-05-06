<?php

namespace App\Decorator;

class EmailNotifierDecorator extends NotifierDecorator implements Notification
{
    protected Notification $notifier;

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
        echo sprintf("Email %s costs %d\n", $message, $this->cost());
    }
}
