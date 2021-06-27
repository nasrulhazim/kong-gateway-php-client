<?php

namespace KongGateway;

class Driver
{
    private $name;

    public function __construct(string $name = null)
    {
        $this->config = function_exists('config') ? config('kong') : require __DIR__.'/../config/kong.php';

        if (empty($name)) {
            $name = $this->config['default'];
        }

        if (! isset($this->config['connections'][$name])) {
            throw new \Exception('Unable to find '.$name.' driver');
        }

        $this->name = $name;
        $this->connection = $this->config['connections'][$name];
        $this->base = rtrim($this->connection['base'], '/');
        $this->uri = ltrim($this->connection['uri'], '/');
        $this->apiKey = $this->connection['apiKey'];
        $this->keyName = $this->connection['keyName'];
    }

    public function name(): string
    {
        return $this->name;
    }

    public function base(): string
    {
        return $this->base;
    }

    public function uri(): string
    {
        return $this->uri;
    }

    public function apiKey(): string
    {
        return $this->apiKey;
    }

    public function keyName(): string
    {
        return $this->keyName;
    }
}
