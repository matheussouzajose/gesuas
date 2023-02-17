<?php

namespace Source\App\Controllers\Api;

use Source\Core\Controller;

class ApiController extends Controller
{
    /** @var array|false */
    protected string|array|false $headers;

    /** @var array|null */
    protected ?array $response;

    public function __construct()
    {
        parent::__construct();

        header('Content-Type: application/json; charset=UTF-8');
        $this->headers = getallheaders();
    }

    /**
     * @param string|null $type
     * @param string|null $message
     * @param string $rule
     * @return $this
     */
    protected function call(string $type = null, string $message = null, string $rule = "errors"): static
    {
        if (!empty($type)) {
            $this->response = [
                $rule => [
                    "type" => $type,
                    "message" => (!empty($message) ? $message : null)
                ]
            ];
        }
        return $this;
    }

    /**
     * @param int $code
     * @param array|null $response
     * @return $this
     */
    protected function back(int $code, array $response = null): static
    {
        http_response_code($code);

        if (!empty($response)) {
            $this->response = (!empty($this->response) ? array_merge($this->response, $response) : $response);
        }

        echo json_encode($this->response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        return $this;
    }
}