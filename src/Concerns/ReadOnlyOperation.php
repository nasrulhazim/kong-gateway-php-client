<?php

namespace KongGateway\Concerns;

trait ReadOnlyOperation
{
    public function store($data)
    {
        throw new \Exceptions('API endpoint did not exist');
    }

    public function update($identifier, $data)
    {
        throw new \Exceptions('API endpoint did not exist');
    }

    public function delete($identifier)
    {
        throw new \Exceptions('API endpoint did not exist');
    }
}
