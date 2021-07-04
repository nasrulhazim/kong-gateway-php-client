<?php

namespace KongGateway\AdminAPI\Plugin\Authentication;

use KongGateway\AdminAPI\Plugin;

class JWT extends Plugin
{
	public $name = 'jwt';

	public function createCredential($consumer)
	{
		return $this->response(
            $this->client()->post($this->consumerPath($consumer).'/jwt')
        );
	}

	public function showConsumerCredentials($consumer)
	{
		return $this->response(
            $this->client()->get($this->consumerPath($consumer).'/jwt')
        );
	}

	public function deleteCredential($consumer, $id)
	{
		return $this->response(
            $this->client()->delete($this->consumerPath($consumer).'/jwt/' . $id)
        );
	}
}
