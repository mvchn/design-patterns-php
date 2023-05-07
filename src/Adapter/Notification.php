<?php

namespace App\Adapter;

interface Notification
{
    public function send(string $title, string $message);
}
