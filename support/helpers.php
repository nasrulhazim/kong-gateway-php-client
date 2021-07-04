<?php

if (! function_exists('kong')) {
    function kong($driver = 'kong')
    {
        return \KongGateway\KongGateway::make(
            new \KongGateway\Config($driver)
        );
    }
}

if (! function_exists('kong_config')) {
    function kong_config()
    {
        if (env('KONG_CONFIG')) {
            return require env('KONG_CONFIG');
        }

        if (function_exists('config')) {
            return config('kong');
        }

        return require __DIR__.'/../config/kong.php';
    }
}

if (! function_exists('kong_plugin')) {
    function kong_plugin($alias)
    {
        $config = kong_config();

        if (! isset($config['plugins'][$alias])) {
            throw new \Exception($alias.' plugin did not exists.');
        }

        if (! class_exists($config['plugins'][$alias])) {
            throw new \Exception($alias.' plugin class did not exists.');
        }

        return $config['plugins'][$alias];
    }
}
