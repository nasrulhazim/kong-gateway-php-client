<?php

namespace KongGateway\Console\Commands;

use Illuminate\Console\Command;

class TestConnectionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kong:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Kong Gateway Connection';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->testConnections();
        $this->testPluginConnections();
    }

    private function testConnections()
    {
        $this->info(kong()->testConnection()[1]);
        collect([
            'consumer',
            'service',
            'route',
            'plugin',
            'tag',
            'information',
            'status',
            'upstream',
            'certificate',
            'caCertificate',
            'sni',
        ])->each(function ($api) {
            $messages = kong()->{$api}()->testConnection();
            $this->info($messages[0]);
        });
    }

    private function testPluginConnections()
    {
        $this->info(kong()->testConnection()[1]);
        collect([
            'proxy-cache',
        ])->each(function ($plugin) {
            $messages = kong()->plugin($plugin)->testConnection();
            $this->info($messages[0]);
        });
    }
}
