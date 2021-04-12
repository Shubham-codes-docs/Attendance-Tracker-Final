
<?php
$functions = spl_autoload_functions();
foreach($functions as $function) {
    spl_autoload_unregister($function);
}

spl_autoload_register(function($class){
    require dirname(__DIR__)."/classes/{$class}.php";
});