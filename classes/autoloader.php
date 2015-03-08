<?php
    set_error_handler("exceptionErrorHandler");

    /**
     * handle include warnings
     * 
     * @param mixed $errno
     * @param string $errstr
     * @param string $errfile
     * @param int $errline
     * 
     * @throws ErrorException
     */
    function exceptionErrorHandler($errno, $errstr, $errfile, $errline) 
    {
        throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
    }
    
    /**
     * function autoloading of the given class
     * 
     * @param type $className
     * 
     * @throws ErrorException
     */
    function autoload($className)
    {
        if (preg_match('/Controller$/', $className)) {
            try {
                include '/controllers/'.$className.'.php';
            } catch (ErrorException $e) {
                throw ErrorException;
            }
        } else if (preg_match('/Interface$/', $className)) {
            require('/interfaces/'.$className.'.php');
        } else if (preg_match('/Model$/', $className)) {
            require('/models/'.$className.'.php');
        } else if (preg_match('/Config$/', $className)) {
            require('/config/'.$className.'.php');
        } else {
            require('/classes/'.$className.'.php');
        }
    }

