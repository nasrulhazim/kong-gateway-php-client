## Create a New Consumer

```php
kong()->consumer()->store([
	'username' => 'your-unique-api-consumer-name',
]);
```

```bash
[
     "status" => [
       "code" => "201",
       "phrase" => "Created",
     ],
     "data" => {#3417
       +"created_at": 1625367190,
       +"id": "1b79a837-5494-45c0-a4a0-ce0405380427",
       +"custom_id": null,
       +"username": "kg-php-client",
       +"tags": null,
     },
     "meta" => [
       "responded_at" => "2021-07-04 02:53:10",
     ],
]
```

## Set Rate Limit for the Consumer

```php
kong()->plugin('traffic-rate-limiting')
	->enableForConsumer('1b79a837-5494-45c0-a4a0-ce0405380427', ['config.second' => 60])
```

Expected output:

```bash
[
     "status" => [
       "code" => "201",
       "phrase" => "Created",
     ],
     "data" => {#3405
       +"id": "ff056f21-8f56-4fa5-921c-d3b3220389f7",
       +"name": "rate-limiting",
       +"tags": null,
       +"created_at": 1625369222,
       +"consumer": {#3381
         +"id": "1b79a837-5494-45c0-a4a0-ce0405380427",
       },
       +"config": {#3399
         +"hour": null,
         +"day": null,
         +"month": null,
         +"year": null,
         +"redis_timeout": 2000,
         +"redis_database": 0,
         +"path": null,
         +"redis_port": 6379,
         +"redis_password": null,
         +"policy": "cluster",
         +"fault_tolerant": true,
         +"header_name": null,
         +"hide_client_headers": false,
         +"redis_host": null,
         +"limit_by": "consumer",
         +"second": 60,
         +"minute": null,
       },
       +"service": null,
       +"route": null,
       +"enabled": true,
       +"protocols": [
         "grpc",
         "grpcs",
         "http",
         "https",
       ],
     },
     "meta" => [
       "responded_at" => "2021-07-04 03:27:02",
     ],
]
```

## Set Key Authentication for the Consumer

```php
kong()->plugin('auth-key')->createKey('1b79a837-5494-45c0-a4a0-ce0405380427', ['config.key_names'=> 'api-key'])
```

Expected Output:

```bash
[
     "status" => [
       "code" => "201",
       "phrase" => "Created",
     ],
     "data" => {#3411
       +"ttl": null,
       +"created_at": 1625369886,
       +"id": "d8f8469b-bfac-4ff0-8f54-a41ba485c07b",
       +"consumer": {#3409
         +"id": "1b79a837-5494-45c0-a4a0-ce0405380427",
       },
       +"key": "7h6xEsMVCVYOr4WvcSOp5LR3oagDfopX",
       +"tags": null,
     },
     "meta" => [
       "responded_at" => "2021-07-04 03:38:07",
     ],
]
```
