<?php

namespace CleaniqueCoders\Profile\Tests;

class HelperTest extends \Orchestra\Testbench\TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('vendor:publish', ['--tag' => 'kong-config']);
    }

    /** @test */
    public function itHasKongHelper()
    {
        $this->assertTrue(function_exists('kong'));
        $this->assertTrue(function_exists('kong_config'));
        $this->assertTrue(function_exists('kong_plugin'));
    }

    /** @test */
    public function itHasConfig()
    {
        $this->assertTrue(function_exists('config'));
        $this->assertTrue(is_array(config('kong')));
        $this->assertTrue(! empty(config('kong')));
        $this->assertTrue(! empty(config('kong.default')));
        $this->assertEquals(config('kong.default'), 'kong');
        $this->assertTrue(! empty(config('kong.plugins')));
        $this->assertTrue(! empty(config('kong.connections')));
        $this->assertTrue(! empty(config('kong.connections.kong')));
    }

    protected function getPackageProviders($app)
    {
        return [
            \KongGateway\KongGatewayServiceProvider::class,
        ];
    }
}
