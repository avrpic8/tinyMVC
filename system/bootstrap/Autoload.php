<?php

namespace System\Bootstrap;

class Autoload{

    public function autoloader(){

        spl_autoload_register(function($className){
            $className = strtolower(str_replace("\\" , DIRECTORY_SEPARATOR, $className));
            //$className = preg_split("#/#", $className);

            //var_dump($className);
            //var_dump(implode("/", $className));
            include_once $_SERVER['DOCUMENT_ROOT'] . '/tinyMVC/' . $className . '.php';
        });
    }
}