<?php

namespace App\Webpack;

use Illuminate\Support\Facades\Facade;

class Webpack extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'webpack';
    }
}
