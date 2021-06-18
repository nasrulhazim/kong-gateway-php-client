<?php

namespace KongGateway\Concerns;

trait SingleOnly
{
    public function show($identifier)
    {
        throw new \Exceptions('API endpoint did not exist');
    }
}
