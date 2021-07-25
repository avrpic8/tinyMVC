<?php

$base_url = "http://localhost/tinyMVC/";
$base_dir = "/tinyMVC/";

$tmp = explode('?', $_SERVER['REQUEST_URI']);
$current_rout = str_replace($base_dir,'', $tmp[0]);

unset($tmp);