# Changelog

All notable changes to `kong-gateway-php-client` will be documented in this file

## 1.2.0 - 2021-06-28

- Added `enableForService($service, $name, $data)` to `kong()->plugin()`
- Added `enableForRoute($route, $name, $data)` to `kong()->plugin()`
- Added `enableForConsumer($consumer, $name, $data)` to `kong()->plugin()`
- Added `enableForGlobal($data)` to `kong()->plugin()`
- Added `plugins` key in `config/kong.php`, where additional plugins also can be define. Usage of the plugin:
    - `kong()->plugin('proxy-cache')->purge()` - `purge()` method only available in the Proxy Cache class.
- Added `Plugin/ProxyCache`, which have additional methods of:
    - `showByPlugin($plugin, $identifier)`
    - `purge()`
- Added `kong_config()`, `kong_plugin($name)`
- Rename `gate` to `kong-test`

Reference to [Proxy Cache](https://docs.konghq.com/hub/kong-inc/proxy-cache/)

## 1.1.1 - 2021-06-28

- Allow multiple connections to Kong Gateway Instances
- Added integration with Laravel / Lumen framework
    - Added `php artisan kong:publish` to published package configuration
    - Added `php artisan kong:test` to test configured Kong Gateway connection
- Updated wiki

## 1.1.0 - 2021-06-28

- Allow multiple connections to Kong Gateway Instances
- Added integration with Laravel / Lumen framework
    - Added `php artisan kong:publish` to published package configuration
    - Added `php artisan kong:test` to test configured Kong Gateway connection
- Updated wiki

## 1.0.2 - 2021-06-21

Fixed bug

## 1.0.1 - 2021-06-21

Update dependencies

## 1.0.0 - 2021-06-21

First release of the package.

Minimum Kong Gateway required is version 2.4.1.

Versioning of this package reflected the Kong Gateway version.
