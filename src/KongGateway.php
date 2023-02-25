<?php

namespace KongGateway;

use GuzzleHttp\Client;

class KongGateway
{
    private $config;

    private $client;

    public const DEFAULT_PLUGIN = \KongGateway\AdminAPI\Plugin::class;

    public function __construct(Config $config)
    {
        $this->config = $config;

        $this->client = new Client([
            'base_uri' => $this->config()->getBase(),
            'headers' => $this->headers(),
            'verify' => $this->verify(),
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

    public function getConnectionName()
    {
        return $this->config()->driver()->name();
    }

    public function headers()
    {
        return $this->config()->headers();
    }

    public function verify()
    {
        return $this->config()->verify();
    }

    public function testConnection($verbose = false)
    {
        $messages = [];
        $messages[] = 'Testing '.get_called_class().' to Kong Gateway Admin API using '.$this->getConnectionName().' connection';
        $response = $this->client()->get('/admin-api');
        $messages[] = $this->getConnectionName().' Connection Status: '.$response->getReasonPhrase();
        if (! $verbose) {
            return $messages;
        } else {
            foreach ($messages as $message) {
                echo $message.PHP_EOL;
            }
            echo PHP_EOL;
        }
    }

    public function consumer(): AdminAPI\Consumer
    {
        return new AdminAPI\Consumer($this);
    }

    public function service(): AdminAPI\Service
    {
        return new AdminAPI\Service($this);
    }

    public function route(): AdminAPI\Route
    {
        return new AdminAPI\Route($this);
    }

    public function plugin($alias = null): Contracts\Plugin
    {
        $class = is_null($alias)
            ? self::DEFAULT_PLUGIN
            : kong_plugin($alias);

        return new $class($this);
    }

    public function tag(): AdminAPI\Tag
    {
        return new AdminAPI\Tag($this);
    }

    public function information(): AdminAPI\InformationRoute
    {
        return new AdminAPI\InformationRoute($this);
    }

    public function status(): AdminAPI\Status
    {
        return new AdminAPI\Status($this);
    }

    public function target(): AdminAPI\Target
    {
        return new AdminAPI\Target($this);
    }

    public function upstream(): AdminAPI\Upstream
    {
        return new AdminAPI\Upstream($this);
    }

    public function certificate(): AdminAPI\Certificate
    {
        return new AdminAPI\Certificate($this);
    }

    public function caCertificate(): AdminAPI\CACertificate
    {
        return new AdminAPI\CACertificate($this);
    }

    public function sni(): AdminAPI\SNI
    {
        return new AdminAPI\SNI($this);
    }
}
