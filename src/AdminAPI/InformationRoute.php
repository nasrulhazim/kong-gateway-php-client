<?php

namespace KongGateway\AdminAPI;

class InformationRoute extends Base
{
    use \KongGateway\Concerns\ReadOnly, \KongGateway\Concerns\SingleOnly;

    public $path = '';
}
