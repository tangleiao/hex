<?php

namespace Uxin\Modules\Traits\ServiceProvider;

trait ModuleRegisterMiddleware
{
    /**
     * Register middleware for modules.
     */
    public function moduleRegisterMiddleware(){
        $middlewares = config($this->moduleName.'.register.middlewares');
        if(is_array($middlewares)){
            foreach ($middlewares as $name => $class)
                $this->app['router']->aliasMiddleware($this->moduleName.'.'.$name, $class);
        }
    }

}
