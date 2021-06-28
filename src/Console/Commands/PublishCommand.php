<?php

namespace KongGateway\Console\Commands;

use Illuminate\Console\Command;

class PublishCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kong:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish Kong Gateway PHP Client configuration';

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
        $messages = kong()->testConnection();
    }
}