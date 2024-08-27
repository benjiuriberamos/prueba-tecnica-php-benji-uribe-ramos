<?php

use Klein\Request;
use Klein\Response;
use App\Controllers\UserController;

$klein = new \Klein\Klein();

$klein->respond('POST', '/save-user', function (Request $request, Response $response, $service) {
    return (new UserController())->createUser($request, $response, $service);
});

$klein->dispatch();