<?php

namespace KongGateway\AdminAPI;

class InformationRoute extends Base
{
    use \KongGateway\Concerns\ReadOnly;
    use \KongGateway\Concerns\SingleOnly;

    public $path = '';
}
