<?php 

namespace KongGateway\API;

class Consumer extends Base implements \KongGateway\Contracts\API
{
	public function index()
	{
		return $this->response(
			$this->client()->get($this->prefix().'/consumers')
		);
	}

	public function store($data)
	{
		return $this->response(
			$this->client()->post($this->prefix().'/consumers', [
				'form_params' => $data
			])
		);
	}

	public function update($identifier, $data)
	{
		return $this->response(
			$this->client()->patch($this->prefix().'/consumers/'.$identifier, $data)
		);
	}

	public function show($identifier)
	{
		return $this->response(
			$this->client()->get($this->prefix().'/consumers/'.$identifier)
		);
	}

	public function delete($identifier)
	{
		return $this->response(
			$this->client()->delete($this->prefix().'/consumers/'.$identifier)
		);
	}
}