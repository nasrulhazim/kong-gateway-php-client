<?php 

namespace KongGateway;

use GuzzleHttp\Client;

class KongGateway
{
	private $config;
	private $client;

	function __construct(Config $config)
	{
		$this->config = $config;

		$this->client = new Client([
		    'base_uri' => $this->config()->getBase(),
		    'headers' => [
		    	$this->config()->apiKeyName() => $this->config()->apiKey(),
		    ],
		    'verify' => false,
		]);
	}

	public static function make(Config $config)
	{
		return new self($config);
	}

	public function config(): Config
	{
		return $this->config;
	}

	public function client(): Client
	{
		return $this->client;
	}

	public function testConnection()
	{
		echo 'Testing Connection to Kong Gateway Admin API' . PHP_EOL;
		$response = $this->client()->get('/admin-api');
		echo 'Connection Status: ' . $response->getReasonPhrase() . PHP_EOL;
	}

	public function consumer(): API\Consumer
	{
		return (new API\Consumer($this));
	}

	public function createConsumer(string $username, array $tags = ['consumer'])
	{
		$response = $this->client()->post('/admin-api/consumers', [
			'form_params' => [
				'username' => $username,
				'tags' => $tags,
			], 'headers' => [
				'Accept' => 'application/json'
			]
		]);
		return [
			'status' => $response->getStatusCode(),
			'data' => $response->getBody(),
		];
	}
}