<?php

namespace App\Services\MonCash;

use Ramsey\Uuid\Uuid;

class OrderIdUUIDService extends OrderIdService
{

    /**
     * @return string
     */
    public function getNewId(): string
    {
        return Uuid::uuid4()->toString();
    }
}
