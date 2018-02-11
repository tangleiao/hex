<?php

if (!function_exists('appCall')) {
    function appCall($contractName, $funcName, $params)
    {
        return App::call($contractName.'@'.$funcName, $params);
    }
}