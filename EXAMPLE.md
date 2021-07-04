## Create a New Consumer

```php
kong()->consumer()->store([
	'username' => 'kg-php-client',//'your-unique-api-consumer-name',
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

## Set Basic Auth for the Consumer

```php
kong()->plugin('auth-basic')->createCredential('1b79a837-5494-45c0-a4a0-ce0405380427', 'kongi', 'KongPassword1234^|')
```

Expected Output:

```bash
[
 "status" => [
   "code" => "201",
   "phrase" => "Created",
 ],
 "data" => {#3413
   +"username": "kongi",
   +"id": "8ce6aebb-b0bc-4317-b18f-1f1ca1c7c3e4",
   +"consumer": {#3411
     +"id": "1b79a837-5494-45c0-a4a0-ce0405380427",
   },
   +"password": "5f7ba9520feecf4a25b7d04daa8ceb3b5db89ceb",
   +"created_at": 1625370747,
   +"tags": null,
 },
 "meta" => [
   "responded_at" => "2021-07-04 03:52:28",
 ],
]
```

Using the credentials - refer [here](https://docs.konghq.com/hub/kong-inc/basic-auth/#using-the-credential)

## Get List of Consumers using Basic Auth

```php
kong()->plugin('basic-auth')->index()
```

```bash
[
 "status" => [
   "code" => "200",
   "phrase" => "OK",
 ],
 "data" => {#3394
   +"data": [
     {#3411
       +"username": "kongi",
       +"id": "8ce6aebb-b0bc-4317-b18f-1f1ca1c7c3e4",
       +"consumer": {#3409
         +"id": "1b79a837-5494-45c0-a4a0-ce0405380427",
       },
       +"password": "5f7ba9520feecf4a25b7d04daa8ceb3b5db89ceb",
       +"created_at": 1625370747,
       +"tags": null,
     },
   ],
   +"next": null,
 },
 "meta" => [
   "responded_at" => "2021-07-04 03:59:14",
 ],
]
```

## Get Basic Auth Details using Consumer 

[Reference](https://docs.konghq.com/hub/kong-inc/basic-auth/#retrieve-the-consumer-associated-with-a-credential)

```php
kong()->plugin('auth-basic')->show('kongi');
```

Expected Output:

```bash
[
 "status" => [
   "code" => "200",
   "phrase" => "OK",
 ],
 "data" => {#3417
   +"created_at": 1625367190,
   +"id": "1b79a837-5494-45c0-a4a0-ce0405380427",
   +"custom_id": null,
   +"username": "kg-php-client",
   +"tags": null,
 },
 "meta" => [
   "responded_at" => "2021-07-04 04:00:09",
 ],
]
```

## Create a New Consumer JWT Credentials

```php
kong()->plugin('auth-jwt')->createCredential('1b79a837-5494-45c0-a4a0-ce0405380427')
```

Expected Output:

```bash
[
 "status" => [
   "code" => "201",
   "phrase" => "Created",
 ],
 "data" => {#3411
   +"id": "887cd9f6-9133-4931-b6ef-c80486a468f2",
   +"rsa_public_key": null,
   +"created_at": 1625372064,
   +"consumer": {#3409
     +"id": "1b79a837-5494-45c0-a4a0-ce0405380427",
   },
   +"secret": "aDX8j6OrewcVLVPQMC84JygQDoGxfB6L",
   +"algorithm": "HS256",
   +"key": "GdLtbBeZ2JudDNrsCGYE9WgxSaEpXY7q",
   +"tags": null,
 },
 "meta" => [
   "responded_at" => "2021-07-04 04:14:24",
 ],
]
```

## List JWT Credentials

```php
kong()->plugin('auth-jwt')->showConsumerCredentials('1b79a837-5494-45c0-a4a0-ce0405380427')
```

Expected Output:

```bash
[
 "status" => [
   "code" => "200",
   "phrase" => "OK",
 ],
 "data" => {#3388
   +"data": [
     {#3417
       +"id": "887cd9f6-9133-4931-b6ef-c80486a468f2",
       +"rsa_public_key": null,
       +"created_at": 1625372064,
       +"consumer": {#3413
         +"id": "1b79a837-5494-45c0-a4a0-ce0405380427",
       },
       +"secret": "aDX8j6OrewcVLVPQMC84JygQDoGxfB6L",
       +"algorithm": "HS256",
       +"key": "GdLtbBeZ2JudDNrsCGYE9WgxSaEpXY7q",
       +"tags": null,
     },
   ],
   +"next": null,
 },
 "meta" => [
   "responded_at" => "2021-07-04 04:25:04",
 ],
]
```

## Delete a JWT credential

```php
kong()->plugin('auth-jwt')->deleteCredential('1b79a837-5494-45c0-a4a0-ce0405380427', '887cd9f6-9133-4931-b6ef-c80486a468f2')
```

Expected Output:

```bash
[
 "status" => [
   "code" => "204",
   "phrase" => "No Content",
 ],
 "data" => null,
 "meta" => [
   "responded_at" => "2021-07-04 04:26:29",
 ],
]
```

You can verify the credentials is deleted by retrieving using `kong()->plugin('auth-jwt')->showConsumerCredentials()`.