<?php

namespace KongGateway\AdminAPI;

class Status extends Base
{
    use \KongGateway\Concerns\ReadOnlyOperation;
    use \KongGateway\Concerns\SingleOnlyOperation;

    public $path = 'status';
}
