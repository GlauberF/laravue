<?php

function urlHelper($path, $extra = [])
{
    $finalPath;

    if (App::environment('local', 'test')) {
        $baseUrl = url('');
        $port = env('APP_DEV_PORT', '8080');
        $trimmedUrl = trim($baseUrl, '/');
        $portUrl = $trimmedUrl . ':' . $port;
        $relativePath = str_replace(url(''), '', url($path, $extra));
        $finalPath = $portUrl . '/dev' . $relativePath;
    } else {
        $finalPath = url($path, $extra);
    }

    return $finalPath;
}
