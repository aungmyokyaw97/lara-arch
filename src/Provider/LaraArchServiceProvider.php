<?php
   
namespace Amk\LaraArch\Provider;

use Illuminate\Support\ServiceProvider;
use Amk\LaraArch\Console\DTOCommand;
use Amk\LaraArch\Console\EnumCommand;
use Amk\LaraArch\Console\RepositoryCommand;
use Amk\LaraArch\Console\ServiceCommand;
use Amk\LaraArch\Console\TraitCommand;

class LaraArchServiceProvider extends ServiceProvider {
        
        
        public function boot(): void
        {
           
        }
        

        public function register(): void
        {
            if ($this->app->runningInConsole()) {
                $this->commands([
                    DTOCommand::class,
                    EnumCommand::class,
                    ServiceCommand::class,
                    TraitCommand::class,
                    RepositoryCommand::class
                ]);
            }

            include_once(__DIR__.'/../Helpers/enum.php');
        }

   }
?>