<?php

namespace App\Tests\Adapter;

use App\Adapter\{TelegramNotification, EmailNotification};
use App\Adapter\TelegramApi;
use PHPUnit\Framework\TestCase;

class AdapterTest extends TestCase
{
    public function testMailNotification(): void
    {
        $target = new EmailNotification('test@test.com');
        $target->send('Notification', 'Hello!');
        $this->assertTrue(true);
    }

    public function testTelegramNotification(): void
    {
        $api = $this->getMockBuilder(TelegramApi::class)
            ->disableOriginalConstructor()
            ->getMock();

        $target = new TelegramNotification($api, '1234');
        $target->send('Notification', 'Hello!');
        $this->assertTrue(true);
    }
}
