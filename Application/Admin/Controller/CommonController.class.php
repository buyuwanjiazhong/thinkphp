<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {

	public function __construct(){

		parent::__construct();
		$this->_init();
	}
    
    private function _init(){
    	$isLogin = $this->isLogin();
    	if(!$isLogin){
    		redirect("./admin.php?c=login");
    	}
        $this->adminAuthor();
        
    }

    public function isLogin(){
    	$session = session("adminUser");
    	if($session && is_array($session)){
    		return true;
    	}
    	return false;
    }

    public function adminAuthor(){
        $authority = D("Menu")->select();
            $session = session("adminUser");
            //dump($session);
            //dump($authority);
            foreach($authority as $al){
                $judge[$al['c']] = ($session['adminlevel'] > $al['level']) ? 0 : 1;
            }
            $judge['login'] = 1;
            //dump($judge);
            //dump($_SERVER["REQUEST_URI"]);
            $p = '/c=([a-z][A-Z]+)/';
            preg_match($p, $_SERVER["REQUEST_URI"], $match);
            if(!$match[1]){
                $match[1] = 'index';
                $judge[$match[1]] = 1;
            }
            //dump($judge);
            //dump($match[1]);
            if(!$judge[$match[1]]){
                $this->error('没有访问权限','./admin.php',10);
            }
            
    }
}

?>