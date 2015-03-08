<?php

/**
 * controller of home page
 * 
 * @author Robert Glazer
 */
class MainController implements ControllerInterface
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
        if (UserController::userSignedIn()) {
            $user = $_SESSION['user'];
            $smarty->assign('user', $user);
        }
        $smarty->assign('title', 'Home Page');
    }
}