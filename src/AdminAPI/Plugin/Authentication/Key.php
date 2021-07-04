<?php

namespace KongGateway\AdminAPI\Plugin\Authentication;

use KongGateway\AdminAPI\Plugin;

class Key extends Plugin
{
    public $path = 'key-auths';

    public function createKey($consumer)
    {
        return $this->response(
            $this->client()->post($this->consumerPath($consumer).'/key-auth')
        );
    }
}
