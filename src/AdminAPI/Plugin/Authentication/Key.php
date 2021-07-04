<?php

namespace KongGateway\AdminAPI\Plugin\Authentication;

use KongGateway\Contracts\Plugin as Contract;

class Key extends \KongGateway\AdminAPI\Plugin implements Contract
{
    public $name = 'key-auth';

    public function createKey($consumer)
    {
        return $this->response(
            $this->client()->post($this->consumerPath($consumer).'/key-auth')
        );
    }
}
