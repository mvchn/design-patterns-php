<?php

namespace App\Tests\Factory;

use App\Factory\{FactoryNotifierException, SimpleFactory, SmsNotifier, EmailNotifier};
use PHPUnit\Framework\TestCase;

class SimpleFactoryTest extends TestCase
{
    public function testNotifierException(): void
    {
        $type = "invalid";
        $this->expectException(FactoryNotifierException::class);
        $this->expectExceptionMessage("The notifier \"{$type}\" does not exist");
        SimpleFactory::createNotifier($type);
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
