<?php

namespace App\MonCash;

class APIClient
{

    public function __construct(public string $id, public string $secret)
    {
    }
}
