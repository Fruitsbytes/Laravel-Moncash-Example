<?php

namespace App\Facades\MonCash;

use Illuminate\Contracts\Container\BindingResolutionException;


class HTTP
{

    /**
     * @param  string  $method
     * @param  array  $arguments
     *
     * @return null
     * @throws BindingResolutionException
     */
    public static function __callStatic(string $method, array $arguments)
    {
       return self::resolve($method, $arguments);
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
        return (app()->make('App\Services\MonCash\HTTPService'))->$name(...$arguments);
    }
}
