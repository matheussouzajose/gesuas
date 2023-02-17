<?php
declare(strict_types=1);

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::error(/**
 * @param $request
 * @param Exception $exception
 * @return void
 */ function($request, \Exception $exception) {
    SimpleRouter::response()
        ->httpCode(404)
        ->json([
            'type' => 'endpoint_not_found',
            'message' => 'Não foi possível processar a requisição'
        ]);
});