<?php

namespace System\Bootstrap;

class Autoload{

    public function autoloader(){

        spl_autoload_register(function($className){

            $className = strtolower(str_replace("\\" , DIRECTORY_SEPARATOR, $className));
            $className = preg_split("#/#", $className);
            $last = array_pop($className);
            array_push($className, ucfirst($last));

            $className = implode("/", $className);
            include_once $_SERVER['DOCUMENT_ROOT'] . '/tinyMVC/' . $className . '.php';
        });
    }
}