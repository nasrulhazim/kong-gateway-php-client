<?php

if (! function_exists('kong')) {
    function kong($driver = 'default')
    {
        return \KongGateway\KongGateway::make(
            new \KongGateway\Config($driver)
        );
    }
}
