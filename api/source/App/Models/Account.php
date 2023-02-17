<?php

namespace Source\App\Models;

use Source\Core\Model;

class Account extends Model
{
    public function __construct()
    {
        parent::__construct("accounts", ["id"], ["name", "document_id"]);
    }
}