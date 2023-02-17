<?php

namespace Source\App\Controllers\Api\v1;

use Source\App\Controllers\Api\ApiController;
use Source\App\Services\AccountService;

class AccountController extends ApiController
{
    /** @var AccountService */
    protected AccountService $accountService;

    public function __construct()
    {
        parent::__construct();
        $this->accountService = new AccountService();
    }

    /**
     * @param string $documentId
     * @return void
     */
    public function show(string $documentId): void
    {
        $documentId = filter_var($documentId, FILTER_SANITIZE_SPECIAL_CHARS);
        $account = $this->accountService->getAccountByDocumentId($documentId);

        if (isset($account['errors'])) {
            $errors = $account['errors'];
            $this->call(
                $errors['type'],
                $errors['message'],
            )->back($errors['code']);
            return;
        }

        $this->back($account['code'], $account['data']);
    }

    /**
     * @return void
     */
    public function store(): void
    {
        $name = input('name');
        $account = $this->accountService->store($name);

        if (isset($account['errors'])) {
            $errors = $account['errors'];
            $this->call(
                $errors['type'],
                $errors['message'],
            )->back($errors['code']);
            return;
        }

        $this->back($account['code'], $account['data']);
    }
}