<?php

namespace Alive2212\LaravelSmartModel\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelSmartModel extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-smart-model';
    }
}
