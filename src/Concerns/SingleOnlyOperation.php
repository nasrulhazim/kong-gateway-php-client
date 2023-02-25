<?php

namespace KongGateway\Concerns;

trait SingleOnlyOperation
{
    public function show($identifier)
    {
        throw new \Exceptions('API endpoint did not exist');
    }
}
