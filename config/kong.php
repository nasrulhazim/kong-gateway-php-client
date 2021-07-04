<?php 

return [
	'default' => 'kong',
	'connections' => [
		'kong' => [
			'base' => env('KONG_ADMIN_BASE'),
			'uri' => env('KONG_ADMIN_URI'),
			'apiKey' => env('KONG_API_KEY'),
			'keyName' => env('KONG_API_KEY_NAME')
		],
	],
	/**
	 * Plugins Implementation based on https://docs.konghq.com/hub/
	 */
	'plugins' => [
		# Authentication
		'auth-basic' => \KongGateway\AdminAPI\Plugin\Authentication\Basic::class,
		'auth-hmac' => \KongGateway\AdminAPI\Plugin\Authentication\HMAC::class,
		'auth-jwt' => \KongGateway\AdminAPI\Plugin\Authentication\JWT::class,
		'auth-key' => \KongGateway\AdminAPI\Plugin\Authentication\Key::class,
		'auth-ldap' => \KongGateway\AdminAPI\Plugin\Authentication\LDAP::class,
		'auth-oauth' => \KongGateway\AdminAPI\Plugin\Authentication\OAuth::class,

		# Logging
		'log-file' => \KongGateway\AdminAPI\Plugin\Logging\FileLog::class,
		'log-http' => \KongGateway\AdminAPI\Plugin\Logging\HTTPLog::class,
		'log-sys' => \KongGateway\AdminAPI\Plugin\Logging\SysLog::class,
		'log-tcp' => \KongGateway\AdminAPI\Plugin\Logging\TCPLog::class,
		'log-udp' => \KongGateway\AdminAPI\Plugin\Logging\UDPLog::class,

		# Security
		'security-acme' => \KongGateway\AdminAPI\Plugin\Security\ACME::class,
		'security-botdetection' => \KongGateway\AdminAPI\Plugin\Security\BotDetection::class,
		'security-cors' => \KongGateway\AdminAPI\Plugin\Security\CORS::class,
		'security-iprestriction' => \KongGateway\AdminAPI\Plugin\Security\IPRestriction::class,

		# Traffic Control
		'traffic-proxy-cache' => \KongGateway\AdminAPI\Plugin\TrafficControl\ProxyCache::class,
		'traffic-acl' => \KongGateway\AdminAPI\Plugin\TrafficControl\ACL::class,
		'traffic-rate-limiting' => \KongGateway\AdminAPI\Plugin\TrafficControl\RateLimiting::class,
		'traffic-request-size-limiting' => \KongGateway\AdminAPI\Plugin\TrafficControl\RequestSizeLimiting::class,
		'traffic-request-termination' => \KongGateway\AdminAPI\Plugin\TrafficControl\RequestTermination::class,
		'traffic-response-rate-limiting' => \KongGateway\AdminAPI\Plugin\TrafficControl\ResponseRateLimiting::class,
		'traffic-kong-response-size-limiting' => \KongGateway\AdminAPI\Plugin\TrafficControl\KongResponseSizeLimiting::class,
		'traffic-kong-service-virtualization' => \KongGateway\AdminAPI\Plugin\TrafficControl\KongServiceVirtualization::class,

		# Transformation
		'transform-correlation-id' => \KongGateway\AdminAPI\Plugin\Transformation\CorrelationID::class,
		'transform-request-transformer' => \KongGateway\AdminAPI\Plugin\Transformation\RequestTransformer::class,
		'transform-response-transformer' => \KongGateway\AdminAPI\Plugin\Transformation\ResponseTransformer::class,
	]
];