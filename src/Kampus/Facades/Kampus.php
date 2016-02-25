<?php

/*
 * Step - 7
 */
namespace Odenktools\Kampus\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @todo
 * @package Odenktools\Kampus\Facades
 *
 */
class Kampus extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'kampus';
    }
}