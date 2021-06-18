<?php

namespace KongGateway\AdminAPI;

class Target extends Base implements \KongGateway\Contracts\API
{
    use \KongGateway\Concerns\Identifier;

    public $path = 'upstreams';

    public function path(): string
    {
        return $this->path().$this->getIdentifier().'/targets';
    }

    public function index()
    {
        return $this->response(
            $this->client()->get($this->path().'/all/')
        );
    }

    public function setTargetAddressHealthy($targetOrId, $address)
    {
        return $this->response(
            $this->client()->post($this->path().'/'.$targetOrId.'/'.$address.'/healthy')
        );
    }

    public function setTargetAddressUnhealthy($targetOrId, $address)
    {
        return $this->response(
            $this->client()->post($this->path().'/'.$targetOrId.'/'.$address.'/unhealthy')
        );
    }

    public function setTargetHealthy($targetOrId)
    {
        return $this->response(
            $this->client()->post($this->path().'/'.$targetOrId.'/healthy')
        );
    }

    public function setTargetUnhealthy($targetOrId)
    {
        return $this->response(
            $this->client()->post($this->path().'/'.$targetOrId.'/unhealthy')
        );
    }
}
