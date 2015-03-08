<?php

/**
 * controller of sign up/in
 * 
 * @author Robert Glazer
 */
class UserController implements ControllerInterface
{
    /**
     * current login, register status
     * 
     * @var string
     */
    protected $status = null;
    
    public function execute() 
    {
        if (isset($_POST['signup'])) {
            $this->signUp();
            $this->status = 'signup';
        } else if (isset($_POST['signin'])) {
            $this->signIn();
        } else if (isset($_GET['signout'])) {
            $this->signOut();
        } else if (isset($_POST['status'])) {
            $this->changeStatus();
        }
        
        if (self::userSignedIn()) {
            header('Location: '.'/links?'.$_SESSION['user']);
        }
    }
    
    /**
     * changing user status
     * 
     */
    protected function changeStatus()
    {
        if (self::userSignedIn() && $_SESSION['user'] == $_POST['userget']) {
            $newStatus = $_POST['status'];

            $userModel = new UserModel();
            $userModel->accounttype  = $newStatus;
            $userModel->id = $_SESSION['id'];
            $userModel->update();
            
            echo $newStatus;
        }
        
        exit;
    }
    
    /**
     * log out user
     * 
     */
    public function signOut() 
    {
        unset($_SESSION['user']);
        unset($_SESSION['id']);
    }
    
    /**
     * sign up user
     * 
     */
    public function signUp() 
    {
        $userModel = new UserModel();
        $userModel->login = $_POST['login'];
        $userModel->pass = $_POST['pass'];
        $userModel->accounttype = $_POST['accounttype'];
        $userModel->save();
    }
    
    /**
     * sign in user
     * 
     */
    public function signIn() 
    {
        $userModel = new UserModel();
        
        $userData = $userModel->getByField(
            'login', $_POST['login'], array('pass', 'login', 'id'));

        $issetUset = isset($userData['pass']);
        if ($issetUset && $userData['pass'] == $_POST['pass']) {
            $_SESSION['user'] = $userData['login'];
            $_SESSION['id'] = $userData['id'];
            
            $this->status = 'signedin';
        } else {
            $this->status = 'wrongpass';
        }
    }
    
    /**
     * generate variables to template
     * 
     * @param Smarty $smarty
     */
    public function generateSmarty(Smarty $smarty) 
    {
        $smarty->assign('title', 'Sign In');
        $smarty->assign('status', $this->status);
    }
    
    /**
     * checking is user signed in
     * 
     * @return bool
     */
    public static function userSignedIn() 
    {
        return isset($_SESSION['user']) ? $_SESSION['user'] : false;
    }
    
    /**
     * checking is account private
     * 
     * @param string $login
     * @return bool
     */
    public static function isAccountPrivate($login)
    {
        $userModel = new UserModel();
        $userData = $userModel->getByField('login', $login, array('accounttype'));
        
        return $userData['accounttype'] == 'private';
    }
}