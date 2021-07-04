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

    /**
     * Retrieve a Cache Entity
     * @link https://docs.konghq.com/hub/kong-inc/proxy-cache/#retrieve-a-cache-entity
     */
    public function showByPlugin($plugin, $identifier)
    {
        return $this->response(
            $this->client()->get($this->pluginPath().'/'.$plugin.'/caches/'.$identifier)
        );
    }

    public function show($identifier)
    {
        return $this->response(
            $this->client()->get($this->pluginPath().'/'.$identifier)
        );
    }

    /**
     * Delete Cache Entity
     * @link https://docs.konghq.com/hub/kong-inc/proxy-cache/#delete-cache-entity
     */
    public function deletePluginCache($plugin, $identifier)
    {
        return $this->response(
            $this->client()->delete($this->pluginPath() .'/'. $plugin.'/caches/'.$identifier);
        );
    }

    public function deleteCache($identifier)
    {
        return $this->response(
            $this->client()->delete($this->pluginPath() .'/'. $identifier)
        );
    }

    /**
     * Purge All Cache Entities
     * @link https://docs.konghq.com/hub/kong-inc/proxy-cache/#purge-all-cache-entities
     */
    public function purge()
    {
        return $this->response(
            $this->client()->delete($this->pluginPath())
        );
    }
}
