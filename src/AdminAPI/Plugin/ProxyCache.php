<?php

namespace KongGateway\AdminAPI\Plugin;

class ClassName extends \KongGateway\AdminAPI\Plugin
{
    public $path = 'proxy-cache';

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
