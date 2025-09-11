
<?php
require 'conf.php';
$directory = array("Global", "layouts", "Forms");

spl_autoload_register(function ($class_name) use ($directory) {
    foreach ($directory as $dir) {
        if (file_exists($dir . '/' . $class_name . '.php')) {
            require_once $dir . '/' . $class_name . '.php';
        }
    }
});
