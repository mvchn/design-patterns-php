<?php

namespace App\Decorator;

class NotifierDecorator extends Notifier
{
    protected int $cost = 1;

    protected function cost(): int
    {
        return $this->cost;
    }

    public function send(string $message): void
    {
        echo $message . ' ' . $this->cost . "\n";
    }
}
