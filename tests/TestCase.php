<?php

namespace Amk\LaraArch\Tests;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{    
    /**
     * getPackageProviders
     *
     * @param  mixed $app
     * @return void
     */
    protected function getPackageProviders($app)
    {
        return [\Amk\LaraArch\Provider\LaraArchServiceProvider::class];
    }


}