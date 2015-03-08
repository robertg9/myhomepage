<?php
    require('/config/SmartyConfig.php');
    require('/classes/autoloader.php');

    spl_autoload_register('autoload');

    session_start();
    Smarty::muteExpectedErrors();
    $controllerClass= new ControllerValidator();

    $controllerName = $controllerClass->getControllerName();
    
    $controller = new $controllerName();
    $controller->execute();
    $controller->generateSmarty($smarty);
    
    $smarty->assign('controller', $controllerName);
    $smarty->display('index.tpl');
?>