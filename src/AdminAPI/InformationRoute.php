<?php

namespace KongGateway\AdminAPI;

class InformationRoute extends Base
{
    use \KongGateway\Concerns\ReadOnlyOperation;
    use \KongGateway\Concerns\SingleOnlyOperation;

    public $path = '';
}
