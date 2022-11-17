<?php

namespace App\Facades\MonCash;

use App\Models\Payment;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Client\Response;
use phpDocumentor\Reflection\Types\Static_;

/**
 * @method  static string createPayement(string $orderId, int $amount)
 * @method  static Payment getOrder(string $orderId);
 * @method  static Payment getTransaction(string $orderId);
 * @method  static Response getRawTransaction(string|int $transactionId)
 * @method  static Payment rawToPayment(Response $response)
 *
 */
class API
{
    /**
     * @param  string  $name
     * @param  array  $arguments
     *
     * @return null
     * @throws BindingResolutionException
     */
    public static function __callStatic(string $name, array $arguments)
    {
        return self::resolve($name, $arguments);
    }

    /**
     * @param  string  $name
     * @param  array  $arguments
     *
     * @return mixed
     * @throws BindingResolutionException
     */
    public static function resolve(string $name, array $arguments): mixed
    {
        return (app()->make('App\Services\MonCash\APIService'))->$name(...$arguments);
    }
}
