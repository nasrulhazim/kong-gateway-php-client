<?php

namespace KongGateway;

use GuzzleHttp\Client;

class KongGateway
{
    private $config;
    private $client;

    public function __construct(Config $config)
    {
        $this->config = $config;

        $this->client = new Client([
            'base_uri' => $this->config()->getBase(),
            'headers' => [
                $this->config()->apiKeyName() => $this->config()->apiKey(),
                'Accept' => 'application/json',
            ],
            'verify' => false,
        ]);
    }

    public static function make(Config $config)
    {
        return new self($config);
    }

    public function config(): Config
    {
        return $this->config;
    }

    public function client(): Client
    {
        return $this->client;
    }

    public function testConnection()
    {
        echo 'Testing Connection to Kong Gateway Admin API'.PHP_EOL;
        $response = $this->client()->get('/admin-api');
        echo 'Connection Status: '.$response->getReasonPhrase().PHP_EOL.PHP_EOL;
    }

    public function consumer(): AdminAPI\Consumer
    {
        return (new AdminAPI\Consumer($this));
    }

    public function service(): AdminAPI\Service
    {
        return (new AdminAPI\Service($this));
    }

    public function route(): AdminAPI\Route
    {
        return (new AdminAPI\Route($this));
    }
}
