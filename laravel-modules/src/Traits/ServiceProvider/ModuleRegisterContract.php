<?php

namespace Uxin\Modules\Traits\ServiceProvider;

use Illuminate\Support\Facades\Config;

trait ModuleRegisterContract
{
    /**
     * Register interface for modules.
     * It is used to Interface oriented programming.
     */
    public function moduleRegisterContract(){
        $contracts = config($this->moduleName.'.register.contracts');
        if(is_array($contracts)){
            foreach($contracts as $val){
                if(isset($val['shared']) && $val['shared'])
                    $this->app->singleton($val['contract'], $val['concrete']);
                else
                    $this->app->bind($val['contract'], $val['concrete']);
            }
        }
    }
}
