<?php

namespace Uxin\Modules\Traits\ServiceProvider;

trait ModuleRegisterCommand
{
    /**
     * Register commands for modules.
     * @param $commands
     */
    public function moduleRegisterCommand(){
        $commands = config($this->moduleName.'.register.commands');
        if(is_array($commands) && !empty($commands))
            $this->commands($commands);
    }

}
