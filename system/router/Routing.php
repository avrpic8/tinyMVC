<?php

namespace System\router;

use ReflectionMethod;

class Routing
{

    private $currentRout;

    public function __construct()
    {
        global $current_rout;

        //example: localhost/tinyMVC/home/index/15
        $this->currentRout = explode('/', $current_rout);
    }

    public function run()
    {
        $path = realpath(dirname(__FILE__) . "/../../application/controllers" . $this->currentRout[0] . ".php");
        if(!file_exists($path)){
            echo "404 - File not exist!!";
            exit();
        }
        require_once($path);

        sizeof($this->currentRout) == 1 ? $method = "index" : $method = $this->currentRout[1];
        $class = "Application\Controllers\\" . $this->currentRout[0];
        $object = new $class();

        if(method_exists($object, $method)){
            $reflection = new ReflectionMethod($class, $method);
            $parameterCount = $reflection->getNumberOfParameters();

            if($parameterCount <= count(array_slice($this->currentRout, 2)))
                call_user_func_array(array($object, $method), array_slice($this->currentRout, 2));
            else echo "404 - parameter error!";
        }else{
            echo "404 - method not exist!";
        }
    }
}