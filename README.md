# Kong Gateway (OSS) PHP Client

This package allowed communication with Kong Gateway Admin API. The supported version is starting from v2.4.1.

## Installation

Make sure to [configure](#configure) your Kong Gateway Admin API first. 

To use this package, simply install with composer:

```
$ composer require nasrulhazim/kong-gateway-php-client
```

### Preparing Kong Gateway 

Once you have installed Kong Gateway, you are required to setup the following service, wrapping Kong Gateway Admin API, Set Rate Limit and secure it with Key Authentication.

```
#!/bin/bash

# Create Admin API Service
curl -X POST http://127.0.0.1:8001/services \
  --data name=admin-api \
  --data host=127.0.0.1 \
  --data port=8001

# Create Admin API Route
curl -X POST http://127.0.0.1:8001/services/admin-api/routes \
  --data paths[]=/admin-api

# Set Rate Limit for Admin API
## config.policy should be redis
curl -X POST http://127.0.0.1:8000/services/admin-api/plugins \
   --data "name=rate-limiting"  \
   --data "config.second=60" \
   --data "config.policy=local"

# Set Key Authentication
curl -X POST http://127.0.0.1:8001/services/admin-api/plugins \
    --data "name=key-auth"  \
    --data "config.key_names=api-key"
```

After secured the Admin API behind Service, we need to create API Consumer details.

```
curl -d "username=kong-php-client" http://127.0.0.1:8001/consumers/
```

You should get something like the following:

```
{
  "username": "kong-php-client",
  "created_at": 1623942949,
  "custom_id": null,
  "id": "c9d2bad5-da62-4c23-bc71-3a4e988fb1fc",
  "tags": null
}
```

Noticed that, above setup we configured that the Admin API only can be access using Key Authentication. 

Next, we need to add created API Consumer above their Key Authentication:

```
curl -X POST http://127.0.0.1:8001/consumers/c9d2bad5-da62-4c23-bc71-3a4e988fb1fc/key-auth 
```

You should get something like the following:

```
{
  "created_at": 1623943058,
  "key": "mEdGHlwekWEiwS71hAyspd9IZ98kOdQf",
  "id": "65d20804-e06c-4099-a983-b255d2ffe44e",
  "tags": null,
  "consumer": {
    "id": "c9d2bad5-da62-4c23-bc71-3a4e988fb1fc"
  },
  "ttl": null
}
```

Now you can access to the Kong Gateway Admin API using the Key Authentication generated above.

Sample usage as following:

```
curl -i http://127.0.0.1:8000/admin-api -H "api-key: mEdGHlwekWEiwS71hAyspd9IZ98kOdQf"
```

Noticed that the header key name use is `api-key`. This is due previously we have configured the key use is `config.key_names=api-key` in earlier step **Set Key Authentication**.

> You may want to secure the Admin API by adding SSL to the Admin API domain. See [admin_listen](https://docs.konghq.com/gateway-oss/2.4.x/configuration/#admin_listen) section for more details.

### Configuration

Once you are done, you can configure the `.env` as necessary.

```
KONG_CONNECTION=kong
KONG_ADMIN_URI=
KONG_ADMIN_BASE=
KONG_API_KEY=
KONG_API_KEY_NAME="api-key"
```

If you're using Laravel / Lumen, you can add configuration file in `config/` directory. 

```bash
$ php artisan kong:publish
```

Once you have published the configuration, you can add multiple Kong Gateway connections.

## Usage

Test the Kong Gateway by running in terminal:

```bash
➜ php gate
Testing Connection to Kong Gateway Admin API
Connection Status: OK

Testing Connection to Kong Gateway Admin API: KongGateway\AdminAPI\Consumer
Connection Status: OK

Testing Connection to Kong Gateway Admin API: KongGateway\AdminAPI\Service
Connection Status: OK

Testing Connection to Kong Gateway Admin API: KongGateway\AdminAPI\Route
Connection Status: OK

Testing Connection to Kong Gateway Admin API: KongGateway\AdminAPI\Plugin
Connection Status: OK

Testing Connection to Kong Gateway Admin API: KongGateway\AdminAPI\Tag
Connection Status: OK

Testing Connection to Kong Gateway Admin API: KongGateway\AdminAPI\InformationRoute
Connection Status: OK

Testing Connection to Kong Gateway Admin API: KongGateway\AdminAPI\Status
Connection Status: OK

Testing Connection to Kong Gateway Admin API: KongGateway\AdminAPI\Upstream
Connection Status: OK

Testing Connection to Kong Gateway Admin API: KongGateway\AdminAPI\Certificate
Connection Status: OK

Testing Connection to Kong Gateway Admin API: KongGateway\AdminAPI\CACertificate
Connection Status: OK

Testing Connection to Kong Gateway Admin API: KongGateway\AdminAPI\SNI
Connection Status: OK
```

If all connections is good, you can start using the Kong Gateway PHP Client. 

Details usage can be found in the [Kong Gateway PHP Client Wiki](https://github.com/nasrulhazim/kong-gateway-php-client/wiki)

## Reference

- [Kong Gateway Admin API](https://docs.konghq.com/gateway-oss/2.4.x/admin-api)

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Nasrul Hazim via [nasrulhazim.m@gmail.com](mailto:nasrulhazim.m@gmail.com). All security vulnerabilities will be promptly addressed.

## License

The Kong Gateway (OSS) PHP Client is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).