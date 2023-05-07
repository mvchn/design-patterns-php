<?php

namespace App\Factory;

interface Notifier
{
    public function send(string $message): void;
}
