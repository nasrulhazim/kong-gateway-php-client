<?php 

return [
	'default' => 'kong',
	'connections' => [
		'kong' => [
			'base' => env('KONG_ADMIN_BASE'),
			'uri' => env('KONG_ADMIN_URI'),
			'apiKey' => env('KONG_API_KEY'),
			'keyName' => env('KONG_API_KEY_NAME')
		]
	]
];