<?php

namespace KongGateway\AdminAPI;

abstract class Base implements \KongGateway\Contracts\API
{
    private $gateway;

    public function __construct(\KongGateway\KongGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function prefix()
    {
        return $this->config()->getUri();
    }

    public function client()
    {
        return $this->gateway->client();
    }

    public function config()
    {
        return $this->gateway->config();
    }

    public function response($response): array
    {
        $this->status_code = trim($response->getStatusCode());
        $this->status_phrase = trim($response->getReasonPhrase());

        return [
            'status' => [
                'code' => $this->statusCode(),
                'phrase' => $this->statusPhrase(),
            ],
            'data' => json_decode((string) $response->getBody()),
            'meta' => [
                'responded_at' => date('Y-m-d H:i:s'),
            ],
        ];
    }

    public function path(): string
    {
        return $this->prefix().'/'.$this->path;
    }

    public function statusCode(): string
    {
        return $this->status_code;
    }

    public function statusPhrase(): string
    {
        return $this->status_phrase;
    }

    public function indexPath()
    {
        return $this->path();
    }

    public function storePath()
    {
        return $this->path();
    }

    public function showPath()
    {
        return $this->path();
    }

    public function updatePath()
    {
        return $this->path();
    }

    public function deletePath()
    {
        return $this->path();
    }

    public function index()
    {
        return $this->response(
            $this->client()->get($this->indexPath())
        );
    }

    public function store($data)
    {
        return $this->response(
            $this->client()->post($this->storePath(), [
                'form_params' => $data,
            ])
        );
    }

    public function update($identifier, $data)
    {
        return $this->response(
            $this->client()->patch($this->updatePath().'/'.$identifier, [
                'form_params' => $data,
            ])
        );
    }

    public function show($identifier)
    {
        return $this->response(
            $this->client()->get($this->showPath().'/'.$identifier)
        );
    }

    public function delete($identifier)
    {
        return $this->response(
            $this->client()->delete($this->deletePath().'/'.$identifier)
        );
    }

    public function getConnectionName()
    {
        return $this->config()->driver()->name();
    }

    public function callTestConnection()
    {
        $this->index();
    }

    public function testConnection($verbose = false)
    {
        $messages = [];
        $messages[] = 'Testing '.get_called_class().' to Kong Gateway Admin API using '.$this->getConnectionName().' connection';
        $this->callTestConnection();
        $messages[] = $this->getConnectionName().' Connection Status: '.$this->statusPhrase();

        if (! $verbose) {
            return $messages;
        } else {
            foreach ($messages as $message) {
                echo $message.PHP_EOL;
            }
            echo PHP_EOL;
        }
    }
}
