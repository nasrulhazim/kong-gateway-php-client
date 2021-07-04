<?php

namespace KongGateway\AdminAPI;

use KongGateway\Contracts\Plugin as PluginContract;

class Plugin extends Base implements PluginContract
{
    public $path = 'plugins';
    public $name = 'plugins'; // name used in sending data to plugin API.

    public function name(): string
    {
        return $this->name;
    }

    public function pluginPath(): string
    {
        return $this->prefix().'/'.$this->name();
    }

    public function servicePath($service): string
    {
        return $this->prefix().'/services/'.$service;
    }

    public function routePath($route): string
    {
        return $this->prefix().'/routes/'.$route;
    }

    public function consumerPath($consumer): string
    {
        return $this->prefix().'/consumers/'.$consumer;
    }

    public function enableServicePath($service): string
    {
        return $this->servicePath($service).'/plugins';
    }

    public function enableRoutePath($route): string
    {
        return $this->routePath($route).'/plugins';
    }

    public function enableConsumerPath($consumer): string
    {
        return $this->consumerPath($consumer).'/plugins';
    }

    public function data($data)
    {
        $parameters = array_merge([
            'name' => $this->name(),
        ], $data);

        return [
            'form_params' => $parameters,
        ];
    }

    // Enabling the plugin on a service
    public function enableForService($service, $data)
    {
        return $this->response(
            $this->client()
                ->post(
                    $this->enableServicePath($service),
                    $this->data($data)
                )
        );
    }

    // Enabling the plugin on a route
    public function enableForRoute($route, $data)
    {
        return $this->response(
            $this->client()
                ->post(
                    $this->enableRoutePath($route),
                    $this->data($data)
                )
        );
    }

    // Enabling the plugin on a consumer
    public function enableForConsumer($consumer, $data)
    {
        return $this->response(
            $this->client()
                ->post(
                    $this->enableConsumerPath($consumer),
                    $this->data($data)
                )
        );
    }

    // Enabling the plugin globally
    public function enableForGlobal($data)
    {
        return $this->store($data);
    }

    public function disableForService($service)
    {
        return $this->response(
            $this->client()
                ->post(
                    $this->enableServicePath($service),
                    $this->data(['enabled' => false])
                )
        );
    }

    public function disableForRoute($route)
    {
        return $this->response(
            $this->client()
                ->post(
                    $this->enableRoutePath($route),
                    $this->data(['enabled' => false])
                )
        );
    }

    public function disableForConsumer($consumer)
    {
        return $this->response(
            $this->client()
                ->post(
                    $this->enableConsumerPath($consumer),
                    $this->data(['enabled' => false])
                )
        );
    }

    public function disableForGlobal($data)
    {
        return $this->store(['enabled' => false]);
    }
}
