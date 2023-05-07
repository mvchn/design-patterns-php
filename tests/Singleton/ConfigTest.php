<?php

namespace App\Tests\Singleton;

use App\Singleton\Config;
use App\Singleton\ConfigEnvException;
use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    public function testConfigException()
    {
        $config = Config::getInstance();
        $this->expectException(ConfigEnvException::class);
        $config->get('APP');
    }

    public function testConfigSuccess()
    {
        $config = Config::getInstance();
        $result = $config->get('APP_ENV');
        $this->assertEquals('test', $result);
    }
}
