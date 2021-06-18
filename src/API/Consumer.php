<?php

namespace KongGateway\API;

class Consumer extends Base implements \KongGateway\Contracts\API
{
    public $path = 'consumers';

    public function index()
    {
        return $this->response(
            $this->client()->get($this->path())
        );
    }

    public function store($data)
    {
        return $this->response(
            $this->client()->post($this->path(), [
                'form_params' => $data,
            ])
        );
    }

    public function update($identifier, $data)
    {
        return $this->response(
            $this->client()->patch($this->path().'/'.$identifier, $data)
        );
    }

    public function show($identifier)
    {
        return $this->response(
            $this->client()->get($this->path().'/'.$identifier)
        );
    }

    public function delete($identifier)
    {
        return $this->response(
            $this->client()->delete($$this->path().'/'.$identifier)
        );
    }
}
