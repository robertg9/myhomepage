<?php
/**
 * prevents csrf attacks 
 *
 * @author Robert Glazer
 */
class Csrf {
    
    /**
     * generate token id if not in session
     * 
     * @return string
     */
    public static function getTokenId() {
        if(isset($_SESSION['tokenid'])) { 
                return $_SESSION['tokenid'];
        } else {
                $randomString = substr(str_shuffle(
                    "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 5, 10);
                $token_id = $randomString;
                $_SESSION['tokenid'] = $token_id;
                return $token_id;
        }
    }
    
    /**
     * generate token if not in session
     * 
     * @return string
     */
    public static function getToken() {
        if(isset($_SESSION['token_value'])) {
            return $_SESSION['token_value']; 
        } else {
            $randomString = substr(str_shuffle(
                "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 5, 10);
            
            $token = hash('sha256', $randomString);
            $_SESSION['token_value'] = $token;
            return $token;
        }
 
    }
    
    /**
     * checks if the token is valid
     * 
     * @param type $method
     * @return boolean
     */
    public static function checkValid($method) {
        if($method == 'post' || $method == 'get') {
            $post = $_POST;
            $get = $_GET;
            if(isset(${$method}[self::getTokenId()]) && (${$method}[self::getTokenId()] == self::getToken())) {
                    return true;
            } else {
                    return false;   
            }
        } else {
                return false;   
        }
}
}
