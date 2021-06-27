<?php

namespace KongGateway;

class Config
{
    public function __construct($driver = null)
    {
        $this->driver = new Driver($driver);
    }

    public function driver(): Driver
    {
        return $this->driver;
    }

    public function getUrl(): string
    {
        return $this->getBase().$this->getUri();
    }

    public function getUri(): string
    {
        return '/'.$this->driver->uri();
    }

    public function getBase(): string
    {
        return $this->driver->base();
    }

    public function apiKey(): string
    {
        return $this->driver->apiKey();
    }

    public function keyName(): string
    {
        return $this->driver->keyName();
    }
}
