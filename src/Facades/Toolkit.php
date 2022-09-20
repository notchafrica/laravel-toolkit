<?php

namespace Notchpay\Toolkit\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Notchpay\Toolkit\Toolkit
 */
class Toolkit extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Notchpay\Toolkit\Toolkit::class;
    }
}
