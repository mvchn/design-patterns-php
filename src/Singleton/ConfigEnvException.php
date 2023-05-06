<?php

namespace App\Singleton;

class ConfigEnvException extends \Exception
{
    public function __construct(string $key)
    {
        parent::__construct("Key {$key} not found in the .env file");
    }
}
