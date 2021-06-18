<?php

namespace KongGateway\AdminAPI;

class Tag extends Base implements \KongGateway\Contracts\API
{
    use \KongGateway\Concerns\ReadOnly;
    
    public $path = 'tags';
}
