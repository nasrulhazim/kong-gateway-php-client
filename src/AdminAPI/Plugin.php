<?php

namespace KongGateway\AdminAPI;

class Plugin extends Base implements \KongGateway\Contracts\API
{
    public $path = 'plugins';

    public function servicePath($service): string
    {
        return $this->prefix().'/services/'.$service.'/'.$this->path;
    }

    public function routePath($route): string
    {
        return $this->prefix().'/routes/'.$route.'/'.$this->path;
    }

    public function consumerPath($consumer): string
    {
        return $this->prefix().'/consumers/'.$consumer.'/'.$this->path;
    }

    // Enabling the plugin on a service
    public function enableForService($service, $name, $data)
    {
        return $this->response(
            $this->client()->post($this->servicePath($name), [
                'form_params' => $data,
            ])
        );
    }

    // Enabling the plugin on a route
    public function enableForRoute($route, $name, $data)
    {
        return $this->response(
            $this->client()->post($this->routePath($name), [
                'form_params' => $data,
            ])
        );
    }

    // Enabling the plugin on a consumer
    public function enableForConsumer($consumer, $name, $data)
    {
        return $this->response(
            $this->client()->post($this->consumerPath($name), [
                'form_params' => $data,
            ])
        );
    }

    // Enabling the plugin globally
    public function enableForGlobal($data)
    {
        return $this->store($data);
    }
}
