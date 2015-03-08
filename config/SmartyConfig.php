<?php
    $projectPath = getcwd();
    define('SMARTY_SPL_AUTOLOAD', 1); 
    define('SMARTY_DIR', $projectPath.'\libs\Smarty\\');
    require_once(SMARTY_DIR.'\Smarty.class.php');
    ini_set('include_path', ini_get('include_path').PATH_SEPARATOR.$projectPath.'\libs\Smarty');
    
    $smarty = new Smarty();
    Smarty::muteExpectedErrors();
    
    $smarty->template_dir = $projectPath.'\smarty\templates';
    $smarty->compile_dir  = $projectPath.'\smarty\templates_c';
    $smarty->config_dir   = $projectPath.'\smarty\configs';
    $smarty->cache_dir    = $projectPath.'\smarty\cache';
    
    //$smarty->testInstall();
    
    //$smarty->debugging = true;

