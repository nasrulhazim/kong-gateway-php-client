<?php 

if(! function_exists('kong')) {
	function kong() {
		$configuration = new \KongGateway\Config(
			env('KONG_ADMIN_BASE'),
			env('KONG_ADMIN_URI'),
			env('KONG_API_KEY'),
			env('KONG_API_KEY_NAME'),
		);
		return \KongGateway\KongGateway::make($configuration);
	}
}