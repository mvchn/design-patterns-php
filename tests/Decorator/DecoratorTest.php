<?php

namespace App\Tests\Decorator;

use App\Decorator\{EmailNotifierDecorator, NotifierDecorator, SmsNotifierDecorator, TelegramNotifierDecorator};
use PHPUnit\Framework\TestCase;

class DecoratorTest extends TestCase
{
    public function testDecorator(): void
    {
        $first = new NotifierDecorator();
        $next1 = new EmailNotifierDecorator($first);
        $next2 = new SmsNotifierDecorator($next1);
        $next3 = new TelegramNotifierDecorator($next2);

        $next3->send('Notification');

        $this->assertTrue(true);
    }
}
