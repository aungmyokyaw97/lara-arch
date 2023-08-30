<?php

namespace Amk\LaraArch\Exceptions;

use Exception;

class EnumException extends Exception
{

    public static function info($reason)
    {
        return new static($reason);
    }
    
}