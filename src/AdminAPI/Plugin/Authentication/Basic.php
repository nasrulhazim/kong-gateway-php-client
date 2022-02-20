<?php

namespace KongGateway\AdminAPI\Plugin\Authentication;

use KongGateway\AdminAPI\Plugin;

class Basic extends Plugin
{
    public $path = 'basic-auths';

    /**
     * Create a credential.
     *
     * @see https://docs.konghq.com/hub/kong-inc/basic-auth/#create-a-credential
     */
    public function createCredential($consumer, $username, $password)
    {
        return $this->response(
            $this->client()->post(
                $this->consumerPath($consumer).'/basic-auth',
                [
                    'form_params' => ['username' => $username, 'password' => 'password'],
                ]
            )
        );
    }

    /**
     * Retrieve the Consumer associated with a Credential.
     *
     * @see https://docs.konghq.com/hub/kong-inc/basic-auth/#retrieve-the-consumer-associated-with-a-credential
     */
    public function show($identifier)
    {
        return $this->response(
            $this->client()->get($this->pluginPath().'/'.$identifier.'/consumer')
        );
    }
}
