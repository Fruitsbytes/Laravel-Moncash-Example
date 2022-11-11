<?php

namespace App\Facades\MonCash;

use Illuminate\Contracts\Container\BindingResolutionException;

/**
 * @method  static string createPayement(string $orderId, int $amount)
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
