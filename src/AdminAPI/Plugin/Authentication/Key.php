<?php

namespace KongGateway\AdminAPI\Plugin\Authentication;

use KongGateway\AdminAPI\Plugin;

class Key extends Plugin
{
    public $name = 'key-auth';

    public function createKey($consumer)
    {
        return $this->response(
            $this->client()->post($this->consumerPath($consumer).'/key-auth')
        );
    }
}
