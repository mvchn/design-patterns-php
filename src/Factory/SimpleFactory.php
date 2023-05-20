<?php

namespace App\Factory;

class SimpleFactory
{
    /**
     * @throws FactoryNotifierException
     */
    public static function createNotifier(string $notifier): Notifier
    {
        if (strtolower($notifier) === 'sms') {
            return new SmsNotifier();
        } elseif (strtolower($notifier) === 'email') {
            return new EmailNotifier();
        } else {
            throw new FactoryNotifierException($notifier);
        }
    }
}
