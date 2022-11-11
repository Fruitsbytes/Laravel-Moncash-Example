<?php

namespace App\Services\MonCash;

class OrderIdService
{

    /**
     * @return string
     */
    public function getNewId(): string
    {
        return uniqid(rand(), true);
    }
}
