<?php

namespace KongGateway;

class Config
{
    private $api_key;
    private $api_key_name;
    private $base;
    private $uri;

    public function __construct(string $base, string $uri, string $api_key, string $api_key_name = 'api-key')
    {
        $this->base = rtrim($base, '/');
        $this->uri = ltrim($uri, '/');
        $this->api_key = $api_key;
        $this->api_key_name = $api_key_name;
    }

    public function getUrl(): string
    {
        return $this->getBase().$this->getUri();
    }

    public function getUri(): string
    {
        return '/'.$this->uri;
    }

    public function getBase(): string
    {
        return $this->base;
    }

    public function apiKey(): string
    {
        return $this->api_key;
    }

    public function apiKeyName(): string
    {
        return $this->api_key_name;
    }
}
