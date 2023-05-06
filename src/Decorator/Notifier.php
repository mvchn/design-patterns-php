<?php

namespace App\Decorator;

abstract class Notifier implements Notification
{
    abstract public function send(string $message): void;
}
