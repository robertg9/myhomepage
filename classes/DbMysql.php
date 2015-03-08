<?php

/**
 * connection to mysql database
 * 
 * @author Robert Glazer
 */
class DbMysql {
    /**
     * stores database instance
     *
     * @var object
     * @access private
     */
    private static $DbMysql = false;
 
    /**
     * returns database instance
     *
     * @return Singleton
     * @access public
     * @static
     */
    public static function getInstance()
    {
        if (self::$DbMysql == false) {
            self::$DbMysql = self::connectDb();
        }
        return self::$DbMysql;
    }
 
    private function __construct() {}
    
    /**
     * connects to database and return PDO object
     * 
     * @return \PDO
     */
    private static function connectDb()
    {
        $dsn = 'mysql:host='.DbConfig::get('host').
            ';dbname='.DbConfig::get('dbname');
        
        $pdo = new PDO($dsn, DbConfig::get('login'), DbConfig::get('pass'));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}
