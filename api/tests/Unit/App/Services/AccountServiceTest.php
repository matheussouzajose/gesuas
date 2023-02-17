<?php
declare(strict_types=1);

namespace tests\Unit\App\Services;

use PHPUnit\Framework\TestCase;
use Source\App\Services\AccountService;

class AccountServiceTest extends TestCase
{
    protected AccountService $accountService;
    public function setUp(): void
    {
        $this->accountService = new AccountService();
    }

    public function test_should_return_string_with_eleven_character_when_generate_document_id_is_called()
    {
        $count = strlen($this->accountService->generateDocumentId());
        $this->assertEquals(11, $count);
    }

    public function test_should_create_new_account()
    {
        $name = 'New Account Test';
        $account = $this->accountService->store($name);

        $this->assertEquals($name, $account['data']['data']['name']);
    }

    public function test_should_return_errors_when_document_id_does_not_exist()
    {
        $documentId = $this->accountService->generateDocumentId();
        $result = $this->accountService->getAccountByDocumentId($documentId);

        $this->assertEquals(404, $result['errors']['code']);
        $this->assertEquals('account_not_found', $result['errors']['type']);
        $this->assertEquals('Cidadão não encontrado', $result['errors']['message']);
    }

    public function test_should_return_correct_values_when_document_id_exist()
    {
        $name = 'Matheus Souza Jose';
        $result = $this->accountService->store($name);
        $accounts = $this->accountService->getAccountByDocumentId($result['data']['data']['document_id']);

        $this->assertEquals($name, $accounts['data']['data']['name']);
    }
}