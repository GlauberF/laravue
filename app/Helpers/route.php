<?php

function routeHelper($name, $parameters = [])
{
    $path;

    if (App::environment('local', 'test')) {
        $baseUrl = url('');
        $port = env('APP_DEV_PORT', '8080');
        $trimmedUrl = trim($baseUrl, '/');
        $portUrl = $trimmedUrl . ':' . $port;
        $relativePath = str_replace(url(''), '', route($name, $parameters));
        $path = $portUrl . '/dev' . $relativePath;
    } else {
        $path = route($name, $parameters);
    }

    return $path;
}
