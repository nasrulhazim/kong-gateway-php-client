<?php

if (! function_exists('kong')) {
    function kong($driver = 'kong')
    {
        return \KongGateway\KongGateway::make(
            new \KongGateway\Config($driver)
        );
    }
}
