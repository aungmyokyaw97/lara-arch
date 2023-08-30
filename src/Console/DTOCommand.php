<?php

namespace Amk\LaraArch\Console;

use Illuminate\Console\GeneratorCommand;

class DTOCommand extends GeneratorCommand
{

    /**
     * Command Name
     *
     * @var string
     */
    protected $name = 'make:dto';
    
    /**
     * Command Description
     *
     * @var string
     */
    protected $description = 'Create a new DTO.';

    /**
     * Command Type
     *
     * @var string
     */
    protected $type = 'DTO';

    /**
     * Get the stub file
     *
     * @return string
     * 
     */
    protected function getStub()
    {
        return __DIR__.'/../stubs/dto.stub';
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
        return $rootNamespace . '\DTO';
    }

}