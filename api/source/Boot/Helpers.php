<?php
declare(strict_types=1);

use Pecee\Http\Input\InputHandler;
use Pecee\SimpleRouter\SimpleRouter as Router;
use Pecee\Http\Url;
use Pecee\Http\Response;
use Pecee\Http\Request;

/**
 * @param string|null $name
 * @param array|string|null $parameters
 * @param array|null $getParams
 * @return Url
 * @throws InvalidArgumentException
 */
function url(?string $name = null, array|string $parameters = null, ?array $getParams = null): Url
{
    return Router::getUrl($name, $parameters, $getParams);
}

/**
 * @return Response
 */
function response(): Response
{
    return Router::response();
}

/**
 * @return Request
 */
function request(): Request
{
    return Router::request();
}

/**
 * Get input class
 * @param string|null $index Parameter index name
 * @param mixed|null $defaultValue Default return value
 * @param array ...$methods Default methods
 * @return InputHandler|array|string|null
 */
function input(string $index = null, mixed $defaultValue = null, ...$methods): array|string|InputHandler|null
{
    if ($index !== null) {
        return request()->getInputHandler()->value($index, $defaultValue, ...$methods);
    }

    return request()->getInputHandler();
}

/**
 * @param int $code
 * @param string $type
 * @param string $message
 * @return array[]
 */
function response_errors(int $code, string $type, string $message): array
{
    return [
        'errors' => [
            'code' => $code,
            'type' => $type,
            'message' => $message
        ]
    ];
}

/**
 * @param int $code
 * @param array $data
 * @return array[]
 */
function response_data(int $code, array $data): array
{
    return [
        'data' => [
            'data' => $data,
        ],
        'code' => $code
    ];
}