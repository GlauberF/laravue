<?php

namespace App\Webpack;

class UrlGenerator
{
    protected $port;

    protected $webpack_fragment;

    public function __construct()
    {
        $this->port = env('APP_DEV_PORT', '8080');
        $this->webpack_fragment = 'dev';
    }

    public function to($path, $parameters = [], $secure = null)
    {
        if(! $this->isDevEnvironment()) {
            return url($path, $parameters, $secure);
        }

        $base_url = url('');
        $full_url = url($path, $parameters, $secure);
        $middel_url = $this->getMiddleUrl();

        return substr_replace($full_url, $middel_url, strlen($base_url), 0);
    }

    public function toRoute($name, $parameters = [], $absolute = true)
    {
        if(! $this->isDevEnvironment()) {
            return route($name, $parameters, $absolute);
        }

        $base_url = url('');
        $full_url = route($name, $parameters, $absolute);
        $middel_url = $this->getMiddleUrl();

        return substr_replace($full_url, $middel_url, strlen($base_url), 0);
    }

    private function getMiddleUrl()
    {
        return ':' . $this->port . '/' . $this->webpack_fragment;
    }

    private function isDevEnvironment()
    {
        return app()->environment('local', 'testing');
    }
}
