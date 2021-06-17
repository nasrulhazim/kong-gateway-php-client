<?php 

namespace KongGateway\Contracts;

interface API {
	public function index();
	public function store($data);
	public function show($identifier);
	public function delete($identifier);
}