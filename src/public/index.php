<?php

if (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 8080) {
    require_once dirname(__DIR__) . '/vendor/autoload.php';
    echo json_encode(['hello world' => 'autoload']);
    exit;
}

use Swoole\Http\Request;
use Swoole\Http\Response;

require_once dirname(__DIR__) . '/vendor/autoload_runtime.php';

return function () {
    return function (Request $request, Response $response) {
        $response->header("Content-Type", "text/plain");
        $response->end("Hello World\n");
    };
};
