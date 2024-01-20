<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;

class InterfaceMakeCommand  extends GeneratorCommand
{
   
    protected $signature = 'make:interface {name}';

    protected $description = 'Create a new Interface class';

    // public function handle()
    // {
    //     // Ambil nama dari argument "name"
    //     $name = $this->argument('name');
        

    //     // Lakukan operasi pembuatan file interface di sini
    //     $this->info('Creating interface: '.$name);
    // }

    protected function getStub()
    {
        return __DIR__ . '/stubs/interface.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\\Interfaces';
    }
}
