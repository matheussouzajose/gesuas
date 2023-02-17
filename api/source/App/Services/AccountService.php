<?php

namespace Source\App\Services;

use Source\App\Models\Account;

class AccountService
{
    /** @var Account */
    protected Account $account;

    public function __construct()
    {
        $this->account = new Account();
    }

    /**
     * @param string $documentId
     * @return object|array
     */
    public function getAccountByDocumentId(string $documentId): object|array
    {
        $accounts = $this->account
            ->find('document_id = :document_id', "document_id={$documentId}")
            ->fetch();

        if (!$accounts) {
            return response_errors(404, 'account_not_found', 'Cidadão não encontrado');
        }

        return response_data(200, (array)$accounts->data());
    }

    /**
     * @param string $name
     * @return array
     */
    public function store(string $name): array
    {
        $this->account->name = $name;
        $this->account->document_id = $this->generateDocumentId();
        $this->account->save();

        if ($errorText = $this->account->message()->getText()) {
            return response_errors(500, 'account_save_error', $errorText);
        }

        return response_data(201, (array)$this->account->data());
    }

    /**
     * @return string
     */
    public function generateDocumentId(): string
    {
        return str_pad(rand(0, '9' . round(microtime(true))), 11, '0', STR_PAD_LEFT);
    }
}