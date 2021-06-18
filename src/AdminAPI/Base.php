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

    public function index()
    {
        return $this->response(
            $this->client()->get($this->path())
        );
    }

    public function store($data)
    {
        return $this->response(
            $this->client()->post($this->path(), [
                'form_params' => $data,
            ])
        );
    }

    public function update($identifier, $data)
    {
        return $this->response(
            $this->client()->patch($this->path().'/'.$identifier, $data)
        );
    }

    public function show($identifier)
    {
        return $this->response(
            $this->client()->get($this->path().'/'.$identifier)
        );
    }

    public function delete($identifier)
    {
        return $this->response(
            $this->client()->delete($this->path().'/'.$identifier)
        );
    }

    public function testConnection()
    {
        echo 'Testing Connection to Kong Gateway Admin API: '.get_called_class().PHP_EOL;
        $this->index();
        echo 'Connection Status: '.$this->statusPhrase().PHP_EOL.PHP_EOL;
    }
}
