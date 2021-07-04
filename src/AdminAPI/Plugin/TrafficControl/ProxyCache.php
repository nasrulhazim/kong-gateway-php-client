<?php

namespace KongGateway\AdminAPI\Plugin\TrafficControl;

use KongGateway\AdminAPI\Plugin;

class ProxyCache extends Plugin
{
    public $plugin_path = 'proxy-cache';

    public function callTestConnection()
    {
        $this->purge();
    }

    public function showByPlugin($plugin, $identifier)
    {
        return $this->response(
            $this->client()->get($this->pluginPath().'/'.$plugin.'/caches/'.$identifier)
        );
    }

    public function purge()
    {
        return $this->response(
            $this->client()->delete($this->pluginPath())
        );
    }
}
