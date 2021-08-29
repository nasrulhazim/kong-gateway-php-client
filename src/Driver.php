<?php

namespace KongGateway;

class Driver
{
    private $name;

    public function __construct(string $name = null)
    {
        $this->config = kong_config();

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
        $this->headers = $this->connection['headers'];
        $this->verify = $this->connection['verify'];
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

    public function headers()
    {
        return $this->headers;
    }

    public function verify()
    {
        return $this->verify;
    }
}
