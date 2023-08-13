<?php

namespace App\Adapter;

class EmailNotification implements Notification
{
    private string $email;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function send(string $title, string $message): void
    {
        // send email $message to $this->email
        echo sprintf("Email to %s with title '%s' was sent\n", $this->email, $title);
    }
}
