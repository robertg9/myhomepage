<?php
/**
 * class generate controller name from requested url
 * 
 * @author Robert Glazer
 */
class ControllerValidator 
{
    /**
     * main page controller name
     * 
     * @var string
     */
    const MAIN_CONTROLLER = 'Main';
    
    /**
     * controller operating 404
     * 
     */
    const ERROR_CONTROLLER = 'Error';
    
    /**
     * current controller
     * 
     * @var string 
     */
    protected $controllerName = null;
    
    /**
     * parsing url to get controller name and sets it to property
     * 
     */
    public function __construct() 
    {
        $controller = null;
        $url = $_SERVER['REQUEST_URI'];

        $regex = '/^\/(?<controller>[a-z]*)($|\?)/U';
        if ($url == '/') {
            $this->controllerName = self::MAIN_CONTROLLER;
        } else if (preg_match('/^\/\?.*$/U', $url)) {
            $this->controllerName = self::MAIN_CONTROLLER;
        } else if (preg_match($regex, $url, $controller)) {
            $this->controllerName = $controller['controller'];
        }
        $this->controllerName = ucfirst(strtolower($this->controllerName)).'Controller';
        // check whether there is a controller if not setting 404 controller to 
        // property controllerName
        try {
            new $this->controllerName;
        } catch (ErrorException $e) {
            $this->controllerName = self::ERROR_CONTROLLER.'Controller';
        }
    }
    
    /**
     * return current controler name
     * 
     * @return string
     */
    public function getControllerName() 
    {
        return $this->controllerName;
    }
}