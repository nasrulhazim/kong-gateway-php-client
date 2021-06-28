<?php

namespace KongGateway\AdminAPI\Plugin;

use KongGateway\Contracts\Plugin as Contract;

class ProxyCache extends \KongGateway\AdminAPI\Plugin implements Contract
{
    public $path = 'proxy-cache';

    public function callTestConnection()
    {
        $this->purge();
    }

    public function showByPlugin($plugin, $identifier)
    {
        return $this->response(
            $this->client()->get($this->path().'/'.$plugin.'/caches/'.$identifier)
        );
    }

    public function purge()
    {
        return $this->response(
            $this->client()->delete($this->path())
        );
    }
}
