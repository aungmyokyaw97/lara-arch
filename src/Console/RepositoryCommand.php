<?php

namespace Amk\LaraArch\Console;

use Amk\LaraArch\Traits\ReplaceModel;
use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class RepositoryCommand extends GeneratorCommand
{
    use ReplaceModel;
    /**
     * Command Name
     *
     * @var string
     */
    protected $name = 'make:repository';
    
    /**
     * Command Description
     *
     * @var string
     */
    protected $description = 'Create a new Repository.';

    /**
     * Command Type
     *
     * @var string
     */
    protected $type = 'Repository';

    /**
     * Get the stub file
     *
     * @return string
     * 
     */
    protected function getStub()
    {
        if ($this->option('model')) {
            return __DIR__.'/../stubs/repository.model.stub';
        }

        return __DIR__.'/../stubs/repository.stub';
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
     * Get the default namespace
     *
     * @return string
     * 
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Repositories';
    }

    /**
     * [Description for buildClass]
     *
     * @param mixed $name
     * 
     * @return [type]
     * 
     */
    protected function buildClass($name)
    {
        $replace = [];
        if ($this->option('model')) {
            $replace = $this->buildModelReplacements($replace);
        }

        return str_replace(
            array_keys($replace), array_values($replace), parent::buildClass($name)
        );
    }


    protected function getOptions()
    {
        return [
            ['model', 'm', InputOption::VALUE_OPTIONAL, 'Generate an repository for the given model.']
        ];
    }

}