<?php

namespace KongGateway\AdminAPI;

class Upstream extends Base implements \KongGateway\Contracts\API
{
    public $path = 'upstreams';

    public function health($identifier)
    {
        return $this->response(
            $this->client()->get($this->path().'/'.$identifier.'/health')
        );
    }
}
