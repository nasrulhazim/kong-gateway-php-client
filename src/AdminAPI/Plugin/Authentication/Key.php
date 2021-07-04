<?php

namespace KongGateway\AdminAPI\Plugin\Authentication;

use KongGateway\AdminAPI\Plugin;

class Key extends Plugin
{
    public $path = 'key-auths';

    /**
     * Create a Key
     * @link https://docs.konghq.com/hub/kong-inc/key-auth/#create-a-key
     */
    public function createKey($consumer)
    {
        return $this->response(
            $this->client()->post($this->consumerPath($consumer).'/key-auth')
        );
    }

    /**
     * Delete A Key
     * @link https://docs.konghq.com/hub/kong-inc/key-auth/#delete-a-key
     */
    public function deleteKey($consumer, $identifier)
    {
        return $this->response(
            $this->client()->delete($this->consumerPath($consumer).'/key-auth/'.$identifier)
        );
    }

    /**
     * Retrieve the Consumer associated with a key
     * @link https://docs.konghq.com/hub/kong-inc/key-auth/#retrieve-the-consumer-associated-with-a-key
     */
    public function show($identifier)
    {
        return $this->response(
            $this->client()->get($this->showPath().'/'.$identifier.'/consumer')
        );
    }
}
