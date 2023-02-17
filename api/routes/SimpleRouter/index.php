<?php
declare(strict_types=1);

use Pecee\Http\Middleware\Exceptions\TokenMismatchException;
use Pecee\SimpleRouter\Exceptions\HttpException as HttpExceptionAlias;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;
use Pecee\SimpleRouter\SimpleRouter;

require_once BASE_PATH . '/routes/SimpleRouter/account.php';
require_once BASE_PATH . '/routes/SimpleRouter/error.php';

try {
    SimpleRouter::start();
} catch (TokenMismatchException|NotFoundHttpException|HttpExceptionAlias|Exception $e) {
}