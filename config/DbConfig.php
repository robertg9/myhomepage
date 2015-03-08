<?php

/**
 * contains database configuration
 * 
 * @author Robert Glazer
 */
class DbConfig 
{
    /**
     * contains database configuration
     * 
     * @var array 
     */
    private static $dbConfig = array(
        'login' => 'root',
        'pass' => '',
        'dbname' => 'myhomepage',
        'host' => 'localhost',
    );
    
    /**
     * returns database configuration field
     * 
     * @param string $key
     * 
     * @return string
     */
    public static function get($key) 
    {
        return self::$dbConfig[$key];
    }
    
}