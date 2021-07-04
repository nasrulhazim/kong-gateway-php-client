<?php

namespace KongGateway\AdminAPI\Plugin\Authentication;

use KongGateway\Contracts\Plugin as Contract;

class Basic extends \KongGateway\AdminAPI\Plugin implements Contract
{
    public $name = 'basic-auth';

    public function createCredential($consumer, $username, $password)
    {
        return $this->response(
            $this->client()->post(
                $this->consumerPath($consumer).'/basic-auth', [
                    'form_params' => ['username' => $username, 'password' => 'password'],
                ])
        );
    }

    public function index()
    {
        return $this->response(
            $this->client()->get($this->prefix().'/basic-auths')
        );
    }

    public function show($identifier)
    {
        return $this->response(
            $this->client()->get($this->prefix().'/basic-auths/'.$identifier.'/consumer')
        );
    }
}
