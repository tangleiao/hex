<?php

namespace Uxin\Modules\Traits\ServiceProvider;

trait ModuleRegisterConfiguration
{

    /**
     * Merge all config file in module.
     */
    public function moduleRegisterConfig(){
        $configFiles = config($this->moduleName.'.register.config_files');
        if(!empty($configFiles)){
            foreach($configFiles as $fileName)
                $this->PublishOneConfig($this->moduleName, $fileName);
        }
    }

    /**
     * Merge one config file, while in console, copy file to app\config directory.
     * @param $module
     * @param $fileName
     */
    public function PublishOneConfig($module, $fileName){
        $this->mergeConfigFrom($this->getModuleConfigFilePath($module, $fileName), strtolower("$module.$fileName"));
        $this->publishes([
            $this->getModuleConfigFilePath($module, $fileName) => config_path(strtolower("$module/$fileName") . '.php'),
        ], 'config');
    }


    private function getModuleConfigFilePath($module, $file)
    {
        return $this->getModulePath($module) . "/Config/$file.php";
    }

    /**
     * @param $module
     * @return string
     */
    private function getModulePath($module)
    {
        return base_path('Modules' . DIRECTORY_SEPARATOR . ucfirst($module));
    }
}
