<?php

/**
 * 404 site controller
 * 
 * @author Robert Glazer
 */
class ErrorController implements ControllerInterface
{
    
    public function execute() 
    {
        
    }
    
    /**
     * generate variables to template
     * 
     * @param Smarty $smarty
     */
    public function generateSmarty(Smarty $smarty) 
    {
        $smarty->assign('title', '404');
    }
}