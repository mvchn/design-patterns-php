<?php

namespace App\Decorator;

class EmailNotifierDecorator extends Notifier implements Notification
{
    protected Notification $notifier;

    public function __construct(Notification $notifier)
    {
        $this->notifier = $notifier;
    }

    public function send(string $message): void
    {
        $this->notifier->send($message);
        echo sprintf("Email %s\n", $message);
    }
}
