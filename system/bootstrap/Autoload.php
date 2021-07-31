<?php

namespace System\Bootstrap;

class Autoload{

    private function updateLast(&$array, $value){
        array_pop($array);
        array_push($array, $value);
    }

    public function autoloader(){

        spl_autoload_register(function($className){
            $className = strtolower(str_replace("\\" , DIRECTORY_SEPARATOR, $className));
            $className = preg_split("#/#", $className);

            $last = array_pop($className);
            array_push($className, ucfirst($last));
            //var_dump($className);
            //var_dump($className);
            $className = implode("/", $className);
            include_once $_SERVER['DOCUMENT_ROOT'] . '/tinyMVC/' . $className . '.php';
        });
    }


}