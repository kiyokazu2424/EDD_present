<?php
namespace libs;

use lib\Message;

function router($path, $method) {
    $path = str_replace(BASE_CONTEXT_PATH, '', $path);
    $path = trim($path, "/");
    $method = strtolower($method);

    if($path == '') {
        $path = 'home';
    }

    $TargetFileName = BASE_PHP_PATH . "controllers/{$path}.php";

    if(!file_exists($TargetFileName)) {
        require_once BASE_PHP_PATH . 'views/404.php';
        return;
    }

    require_once $TargetFileName;

    $path = str_replace("/", "\\", $path);
    
    $Fn = "\\controllers\\{$path}\\{$method}";
    $Fn();
}