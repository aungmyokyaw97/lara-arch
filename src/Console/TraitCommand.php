<?php

namespace Amk\LaraArch\Console;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class TraitCommand extends GeneratorCommand
{

    /**
     * Command Name
     *
     * @var string
     */
    protected $name = 'make:trait';
    
    /**
     * Command Description
     *
     * @var string
     */
    protected $description = 'Create a new Trait.';

    /**
     * Command Type
     *
     * @var string
     */
    protected $type = 'Trait';

    /**
     * Get the stub file
     *
     * @return string
     * 
     */
    protected function getStub()
    {
        return __DIR__.'/../stubs/trait.stub';
    }

    /**
     * Get the dir
     *
     * @param mixed $name
     * 
     * @return string
     * 
     */
    protected function getPath($name)
    {
        $name = str_replace('\\', '/', $name);

        return $this->laravel->basePath().'/'.$name.'.php';
    }

    /**
     * Get the namespace
     *
     * @return string
     * 
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Traits';
    }

}