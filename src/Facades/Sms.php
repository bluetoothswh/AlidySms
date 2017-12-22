<?php

namespace LaraMall\AlidySms\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Mews\Captcha
 */
class Sms extends Facade
{

    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'sms';
    }
}
