<?php

/**
 * @author yooper
 * Bootstrap file for running unit tests
 */
error_reporting(E_ALL);
ini_set('display_startup_errors', 1);

define('DS',DIRECTORY_SEPARATOR);

// test data files
define('TEST_DATA_DIR',__DIR__.'/data');

defined('LIB_PATH')
    || define('LIB_PATH', realpath(dirname(__FILE__) . DS .'../src/'.DS));

defined('TESTS_PATH')
    || define('TESTS_PATH', realpath(dirname(__FILE__)).DS);

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(LIB_PATH . 'TextAnalysis'),
    realpath(TESTS_PATH),
    realpath(getcwd().DS."..".DS),
    get_include_path()
)));

error_reporting(E_ALL);
ini_set('display_startup_errors', 1);

spl_autoload_register('autoloader');

function autoloader($className){
    
    if(strpos($className, "Tests") !== false) {
        $newClassName = str_replace("\\", DS, $className);
        include_once $newClassName.'.php';
    } else {
        $newClassName = str_replace("\\", DS, $className);
        include_once LIB_PATH.DS.$newClassName.'.php';
    }
}
