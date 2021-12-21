<?php

namespace Jecar\Commerce\Facades;

use Illuminate\Support\Facades\Facade;

class Commerce extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'jecar-commerce';
    }
}
