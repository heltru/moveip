<?php
function app_autoloader($class) {
    $path = dirname(__FILE__) . '/../' . str_replace("\\", "/", $class) . '.php';
    if (is_file($path)) include_once $path;
}

spl_autoload_register('app_autoloader');