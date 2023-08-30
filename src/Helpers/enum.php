<?php
declare(strict_types=1);

use Amk\LaraArch\Exceptions\EnumException;
use Illuminate\Support\Collection;


/**
 * enum_from_key
 *
 * @param  array $cases
 * @param  mixed $key
 * @return mixed
 */
if(!function_exists('enum_from_key')){    
    function enum_from_key(array $cases,$key){
        return collect($cases)->pluck('value','name')[$key] ?? throw EnumException::info("Undefined array key ".$key);
    }
}

/**
 * enum_from_value
 *
 * @param  array $cases
 * @param  mixed $value
 * @return mixed
 */
if(!function_exists('enum_from_value')){    
    function enum_from_value(array $cases,$value){
        return collect($cases)->pluck('name','value')[$value] ?? throw EnumException::info("Undefined array key ".$value);
    }
}