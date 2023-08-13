<?php

namespace App\Adapter;

class TelegramNotification implements Notification
{
    private $api;

    private string $chatId;

    public function __construct(TelegramApi $api, $chatId)
    {
        $this->api = $api;
        $this->chatId = $chatId;
    }

    public function send(string $title, string $message): void
    {
        $this->api->sendMessage($this->chatId, $title . ': ' . $message);
        echo "Sent message to Telegram.\n";
    }
}
