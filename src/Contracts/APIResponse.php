<?php

namespace KongGateway\Contracts;

interface APIResponse
{
    public function response($response): array;

    public function statusCode(): string;

    public function statusPhrase(): string;
}
