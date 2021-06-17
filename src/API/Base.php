<?php 

namespace KongGateway\API;

class Base
{
	private $gateway;

	function __construct(\KongGateway\KongGateway $gateway)
	{
		$this->gateway = $gateway;
	}

	public function prefix()
	{
		return $this->config()->getUri();
	}

	public function client()
	{
		return $this->gateway->client();
	}

	public function config()
	{
		return $this->gateway->config();
	}

	public function response($response)
	{
		return [
			'status' => $response->getStatusCode(),
			'data' => json_decode((string) $response->getBody()),
		];
	}
}