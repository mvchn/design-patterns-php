<?php

namespace App\Singleton;

class Config
{
    private static $instance;
    private array $config;

    private function __construct()
    {
        $this->config = parse_ini_file(__DIR__ . '/../../.env.example');
    }

    public static function getInstance(): Config
    {
        if (self::$instance === null) {
            self::$instance = new Config();
        }

        return self::$instance;
    }

    /**
     * @throws ConfigEnvException
     */
    public function get(string $key): string
    {
        if(!array_key_exists($key, $this->config)) {
            throw new ConfigEnvException($key);
        }

        return $this->config[$key];
    }
}
