<?php

namespace KongGateway\AdminAPI\Plugin\Authentication;

use KongGateway\AdminAPI\Plugin;

class JWT extends Plugin
{
    public $path = 'jwts';

    /**
     * Create a JWT credential.
     *
     * @see https://docs.konghq.com/hub/kong-inc/jwt/#create-a-jwt-credential
     */
    public function createCredential($consumer)
    {
        return $this->response(
            $this->client()->post($this->consumerPath($consumer).'/jwt')
        );
    }

    /**
     * Retrieve the Consumer associated with a JWT.
     *
     * @see https://docs.konghq.com/hub/kong-inc/jwt/#retrieve-the-consumer-associated-with-a-jwt
     */
    public function show($identifier)
    {
        return $this->response(
            $this->client()->get($this->pluginPath().'/'.$identifier.'/consumer')
        );
    }

    /**
     * List JWT credentials.
     *
     * @see https://docs.konghq.com/hub/kong-inc/jwt/#list-jwt-credentials
     */
    public function showConsumerCredentials($consumer)
    {
        return $this->response(
            $this->client()->get($this->consumerPath($consumer).'/jwt')
        );
    }

    /**
     * Delete a JWT Credential.
     *
     * @see https://docs.konghq.com/hub/kong-inc/jwt/#delete-a-jwt-credential
     */
    public function deleteCredential($consumer, $id)
    {
        return $this->response(
            $this->client()->delete($this->consumerPath($consumer).'/jwt/'.$id)
        );
    }
}
