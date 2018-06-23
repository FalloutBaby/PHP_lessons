<?php

include_once "../engine/app.php";

$url = strtolower($_SERVER['REQUEST_URI']);

if ($cleanUrl = stristr($url, '?', true)) {
    $path = explode('/', $cleanUrl);
} else {
    $path = explode('/', $url);
}

$module = empty($path[1]) ? 'main' : $path[1];
$action = empty($path[2]) ? 'index' : $path[2];
$moduleFilename = MODULES_DIR . $module . '.php';
$function = $module . '_' . $action;

if( file_exists($moduleFilename)) {
    require_once ($moduleFilename);
    if(function_exists($function)) {
        $function();
    } else {
       echo render('account/index.php');
    }
} else {
   echo render('account/index.php');
}

?>