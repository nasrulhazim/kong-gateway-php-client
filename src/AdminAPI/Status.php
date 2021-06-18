<?php

namespace KongGateway\AdminAPI;

class Status extends Base
{
    use \KongGateway\Concerns\ReadOnly, \KongGateway\Concerns\SingleOnly;

    public $path = 'status';
}
