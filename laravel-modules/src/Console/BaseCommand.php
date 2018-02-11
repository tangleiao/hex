<?php

namespace Uxin\Modules\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class BaseCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = '';

    /**
     * module name.
     */
    protected $moduleName ;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->moduleName = $this->getModuleName();
        $this->setName(strtolower($this->moduleName).'.'.$this->name);
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        print_r("This is a command test.");
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['example', InputArgument::REQUIRED, 'An example argument.'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }

    /**
     * Obtain module name via a object..
     */
    public function getModuleName(){
        $reflection = new \ReflectionClass($this);
        $spaceArr = explode('\\', $reflection->name);
        return isset($spaceArr[1]) ? $spaceArr[1] : null;
    }


}
