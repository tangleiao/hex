<?php

namespace Uxin\Modules\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Uxin\Modules\Traits\ServiceProvider\ModuleRegisterConfiguration;
use Uxin\Modules\Traits\ServiceProvider\ModuleRegisterCommand;
use Uxin\Modules\Traits\ServiceProvider\ModuleRegisterMiddleware;
use Uxin\Modules\Traits\ServiceProvider\ModuleRegisterContract;

class ModuleBaseServiceProvider extends ServiceProvider
{
    use ModuleRegisterCommand, ModuleRegisterConfiguration;
    use ModuleRegisterMiddleware, ModuleRegisterContract;

    /**
     * Project name or short name
     */
    protected $projectName;

    /**
     * module name.
     */
    protected $moduleName;

    /**
     * The configure file array under module.
     */
    protected $moduleConfigFiles;

    /**
     * The middleware array under module.
     */
    protected $moduleMiddleware;

    /**
     * The commands array under module.
     */
    protected  $moduleCommands;

    /**
     * The contracts array under module.
     */
    protected  $moduleInterface;

    public function __construct(\Illuminate\Contracts\Foundation\Application $app){
        parent::__construct($app);
        $this->moduleName = strtolower($this->getModuleName());
    }

    public function boot(){

    }

    /**
     * Register configure and compoments.
     */
    public function register(){
//        $this->projectName = strtolower(config('app.name'));
        $this->projectName = 'mc';
        $this->PublishOneConfig($this->moduleName, 'config');
        $this->PublishOneConfig($this->moduleName, 'register');

        $this->moduleRegisterConfig();
        $this->moduleRegisterMiddleware();
        $this->moduleRegisterCommand();
        $this->moduleRegisterContract();
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
