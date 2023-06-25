<?php

namespace Notch\Toolkit\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Notch\Toolkit\Toolkit
 */
class Toolkit extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Notch\Toolkit\Toolkit::class;
    }
}
