### Kong Gateway (OSS) PHP Client

This package allowed communication with Kong Gateway Admin API.

## Configuration

 You are required to secure your Kong Gateway. See [Secure the Admin API](#secure-the-admin-api).

 Once you are done, configure the `.env`:

 ```
KONG_ADMIN_URI="admin-api"
KONG_ADMIN_BASE="http://<domain>:8000"
KONG_API_KEY="<your-api-key>"
KONG_API_KEY_NAME="api-key"
 ```

### Secure the Admin API

```
$ curl -X POST http://127.0.0.1:8001/services \
  --data name=admin-api \
  --data host=127.0.0.1 \
  --data port=8001
```

```
$ curl -X POST http://127.0.0.1:8001/services/admin-api/routes \
  --data paths[]=/admin-api
```

### Create Consumer

```
curl -d "username=kong-php-client" http://127.0.0.1:8001/consumers/
```

```
{"username":"kong-php-client","created_at":1623942949,"custom_id":null,"id":"c9d2bad5-da62-4c23-bc71-3a4e988fb1fc","tags":null}
```

### Create API Key

```
curl -X POST http://127.0.0.1:8001/consumers/c9d2bad5-da62-4c23-bc71-3a4e988fb1fc/key-auth 
```

```
{"created_at":1623943058,"key":"mEdGHlwekWEiwS71hAyspd9IZ98kOdQf","id":"65d20804-e06c-4099-a983-b255d2ffe44e","tags":null,"consumer":{"id":"c9d2bad5-da62-4c23-bc71-3a4e988fb1fc"},"ttl":null}
```

### Enable Key Auth on Admin API Service

```
curl -X POST http://127.0.0.1:8001/services/admin-api/plugins \
    --data "name=key-auth"  \
    --data "config.key_names=api-key"
```

```
 {"enabled":true,"created_at":1623943217,"protocols":["grpc","grpcs","http","https"],"tags":null,"config":{"key_in_body":false,"run_on_preflight":true,"anonymous":null,"key_names":["api-key"],"hide_credentials":false,"key_in_header":true,"key_in_query":true},"service":{"id":"ab92c4f5-db6d-4032-9dd9-80a56cf79d0a"},"id":"cb31ec68-d2ee-4ffb-a16e-30ab9a5514e4","route":null,"consumer":null,"name":"key-auth"}
 ```

 ### Set Rate Limit for Admin API

 ```
 curl -X POST http://127.0.0.1:8000/services/admin-api/plugins \
    -H 'api-key: mEdGHlwekWEiwS71hAyspd9IZ98kOdQf' \
    --data "name=rate-limiting"  \
    --data "config.second=60" \
    --data "config.policy=local"
```

### Enable SSL for Admin API

You may want to secure the Admin API by adding SSL to the Admin API domain. See [admin_listen](https://docs.konghq.com/gateway-oss/2.4.x/configuration/#admin_listen) section for more details.

 ## Usage

 ```php
$store = kong()->consumer()->store([
  'username' => 'gate'.date('Ymdhis'),
  'tags' => 'gate'
]);
$show = kong()->consumer()->show($store['data']->id);
$list = kong()->consumer()->index();

echo 'SHOW: ' . $show->id . PHP_EOL;
echo 'STORE: ' . $store['data']->id . PHP_EOL;
foreach($list['data'] as $datum) {
  echo 'LIST: ' . $datum['id'] . PHP_EOL;
}
```

## Reference

- [Kong Gateway Admin API](https://docs.konghq.com/gateway-oss/2.4.x/admin-api/#consumer-object)

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Nasrul Hazim via [nasrulhazim.m@gmail.com](mailto:nasrulhazim.m@gmail.com). All security vulnerabilities will be promptly addressed.

## License

The Kong Gateway (OSS) PHP Client is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).