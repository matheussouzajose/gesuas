<?php
declare(strict_types=1);

use Pecee\SimpleRouter\SimpleRouter;
use Source\App\Controllers\Api\v1\AccountController;

SimpleRouter::setDefaultNamespace('Source\App\Controllers\Api\v1');

SimpleRouter::group(['prefix' => '/api/v1'], function () {
    SimpleRouter::post('/accounts', [AccountController::class, 'store']);
    SimpleRouter::get('/accounts/{documentId}', [AccountController::class, 'show']);
});