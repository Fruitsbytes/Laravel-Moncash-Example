<?php

namespace App\Services\MonCash;

use Illuminate\Support\Str;

class OrderIdUUIDService extends OrderIdService
{

    /**
     * @return string
     */
    public function getNewId(): string
    {
        return (string) Str::uuid();
    }
}
