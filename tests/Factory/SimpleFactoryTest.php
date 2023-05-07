<?php

namespace App\Tests\Factory;

use App\Factory\{FactoryNotifierException, SimpleFactory, SmsNotifier, EmailNotifier};
use PHPUnit\Framework\TestCase;

class SimpleFactoryTest extends TestCase
{
    public function testNotifierException(): void
    {
        $this->expectException(FactoryNotifierException::class);
        SimpleFactory::createNotifier("invalid");
    }

    public function testSmsNotifier(): void
    {
        $notifier = SimpleFactory::createNotifier("SMS");
        $notifier->send("Test message");
        $this->assertInstanceOf(SmsNotifier::class, $notifier);
    }

    public function testEmailNotifier(): void
    {
        $notifier = SimpleFactory::createNotifier("Email");
        $notifier->send("Test message");
        $this->assertInstanceOf(EmailNotifier::class, $notifier);
    }
}
