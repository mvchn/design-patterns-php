<?php

namespace App\Factory;

class FactoryNotifierException extends \Exception
{
    public function __construct(string $type)
    {
        parent::__construct("The notifier {$type} does not exist");
    }
}
