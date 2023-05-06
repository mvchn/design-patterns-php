<?php

namespace App\Decorator;

interface Notification
{
    public function send(string $message): void;
}