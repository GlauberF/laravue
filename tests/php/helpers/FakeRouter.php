<?php

class FakeRouter
{
    protected $array_route = [
        'home' => '/home',
    ];

    public static function swap()
    {
        app()->instance('url', new static)  ;
    }

    public function route($string)
    {
        return env('APP_URL') . $this->array_route[$string];
    }

    public function to($name, $parameters = [], $absolute = true)
    {
        if($name == '')
            return env('APP_URL');
    }
}
