<?php

use App\Controllers\Admin\BannerController;
use App\Controllers\Client\AboutController;
use App\Controllers\Client\HomeController;

$router->get('/', HomeController::class . '@index');
$router->get('/productDetail/{id}', HomeController::class . '@productDetail');
$router->get('/banner', BannerController::class . '@productDetail');


$router->get('/about', AboutController::class . "@index");