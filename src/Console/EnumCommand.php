<?php

namespace Amk\LaraArch\Console;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class EnumCommand extends GeneratorCommand
{

    /**
     * Command Name
     *
     * @var string
     */
    protected $name = 'make:enum';
    
    /**
     * Command Description
     *
     * @var string
     */
    protected $description = 'Create a new Enum.';

    /**
     * Command Type
     *
     * @var string
     */
    protected $type = 'Enum';

    /**
     * Get the stub file
     *
     * @return string
     * 
     */
    protected function getStub()
    {
        return __DIR__.'/../stubs/enum.stub';
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
        return $rootNamespace . '\Enums';
    }

}