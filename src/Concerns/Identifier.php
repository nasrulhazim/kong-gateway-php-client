<?php

namespace KongGateway\Concerns;

trait Identifier
{
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;

        return $this;
    }

    public function getIdentifier()
    {
        return $this->identifier;
    }
}
