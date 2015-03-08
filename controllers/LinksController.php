<?php

/**
 * link page controller
 * 
 * @author Robert Glazer
 */
class LinksController implements ControllerInterface
{
    
    /**
     * whether the logged in user is the owner of the page
     * 
     * @var bool 
     */
    protected $loggedInUserPage = false;
    
    /**
     * user links
     * 
     * @var array
     */
    protected $userLinks = array();
    
    public function execute() 
    {
        $loginGet = key($_GET);
        $sessionUser = isset($_SESSION['user']) ? $_SESSION['user'] : false;

        if ($loginGet != $sessionUser && 
            UserController::isAccountPrivate($loginGet)) {
            
            header('Location: '.'/');
        }
        
        if (isset($_POST['link-list']) && UserController::userSignedIn()) {
            $this->saveLinks();
        }
        
        $this->setUserLinks();
    }
    
    /**
     * download links from database and seting it to variable userLinks
     * 
     */
    protected function setUserLinks()
    {
        $userModel = new UserModel();
        $loginGet = key($_GET);
        $userData = $userModel->getByField('login', $loginGet, array('id'));
        $userModel->id = $userData['id'];
        
        $this->userLinks = $userModel->getLinks();
    }
    
    /**
     * saving links to database
     * 
     * @return bool
     */
    protected function saveLinks()
    {
        if (!Csrf::checkValid('post')) {
            return false;
        }
        $counter = 1;
        do {
            $link = $_POST['link'.$counter];
            if ($domain = $this->validateUrl($link)) {
                $userId = $_SESSION['id'];
                $linkModel = new LinksModel();
                $linkModel->userlink = $link;
                $linkModel->domainname = $domain;
                $linkModel->userid = $userId;
                $linkModel->save();
            }
            
            $counter++;
        } while(isset($_POST['link'.$counter]));
    }
    
    /**
     * validate url if correct return domain name otherwise return false
     * 
     * @param string $url
     * @return boolean|array
     */
    protected function validateUrl($url)
    {
        $result = array();
        $regex = '/(www\.|http\:\/\/)(?<domain>.*)(\/|$|\?)(?<linkparams>.*)$/U';
        if (preg_match($regex, $url, $result)) {
            return $result['domain'];
        }
        return false;
    }
    
    /**
     * generate variables to template
     * 
     * @param Smarty $smarty
     */
    public function generateSmarty(Smarty $smarty) 
    {
        $loginGet = key($_GET);
        if (UserController::userSignedIn()) {
            $user = $_SESSION['user'];
            $smarty->assign('user', $user);
            
            if ($user == $loginGet) {
                $this->loggedInUserPage = true;
            }
        }
        
        $userModel = new UserModel();
        $userData = $userModel->getByField('login', $loginGet, array('accounttype'));
        
        $smarty->assign('userStatus', $userData['accounttype']);
        $smarty->assign('userlinks', $this->userLinks);
        $smarty->assign('loggedInUserPage', $this->loggedInUserPage);
        $smarty->assign('userget', $loginGet);
        $smarty->assign('title', $loginGet.' links');
        
        $smarty->assign('csrfId', Csrf::getTokenId());
        $smarty->assign('csrf', Csrf::getToken());
    }
}