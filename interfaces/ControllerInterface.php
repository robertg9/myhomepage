<?php

/**
 * interface required in controllers
 * 
 * @author Robert Glazer
 */
interface ControllerInterface
{
    /*
     * required method for each controller that starts controller
     * 
     */
    public function execute();
    
    /**
     * generates variables to smarty template
     * 
     * @param Smarty $smarty
     */
    public function generateSmarty(Smarty $smarty);
}