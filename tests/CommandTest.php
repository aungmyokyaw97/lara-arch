<?php
namespace Amk\LaraArch\Tests;

use Illuminate\Support\Facades\Artisan;

class CommandTest extends TestCase
{    
    /**
     * testDTOCommand
     *
     * @return void
     */
    public function testDTOCommand()
    {
        Artisan::call('make:dto TestDTO');
        $this->assertTrue(true); 
    }
    
    /**
     * testEnumCommand
     *
     * @return void
     */
    public function testEnumCommand()
    {
        Artisan::call('make:enum TestEnum');
        $this->assertTrue(true); 
    }
    
    /**
     * testTraitCommand
     *
     * @return void
     */
    public function testTraitCommand()
    {
        Artisan::call('make:trait TestTrait');
        $this->assertTrue(true); 
    }
    
    /**
     * testServiceCommand
     *
     * @return void
     */
    public function testServiceCommand()
    {
        Artisan::call('make:service TestService');
        $this->assertTrue(true); 
    }
    
    /**
     * testRepositoryCommand
     *
     * @return void
     */
    public function testRepositoryCommand()
    {
        Artisan::call('make:repository TestRepository');
        $this->assertTrue(true); 
    }
    
    /**
     * testRepositoryWithModelCommand
     *
     * @return void
     */
    public function testRepositoryWithModelCommand()
    {
        Artisan::call('make:repository TestRepository --model="User"');
        $this->assertTrue(true); 
    }
}