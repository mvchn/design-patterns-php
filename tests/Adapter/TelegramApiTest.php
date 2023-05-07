<?php

namespace App\Tests\Adapter;

use App\Adapter\TelegramApi;
use PHPUnit\Framework\TestCase;

class TelegramApiTest extends TestCase
{
    public function testTelegramApi(): void
    {
        $target = new TelegramApi('12345678', 'XXXXXXX');
        $target->sendMessage('1234', 'Hello!');
        $this->assertTrue(true);
    }
}
