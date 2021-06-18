<?php

namespace KongGateway\API;

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
}
