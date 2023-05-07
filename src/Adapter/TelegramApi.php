<?php

namespace App\Adapter;

class TelegramApi
{
    private string $appId;
    private string $apiKey;

    public function __construct(string $appId, string $apiKey)
    {
        $this->appId = $appId;
        $this->apiKey = $apiKey;
    }

    public function sendMessage(string $chatId, string $message): void
    {
        // Send message via Telegram API
        echo "Posted following message into the '$chatId' chat: '$message'.\n";
    }
}
