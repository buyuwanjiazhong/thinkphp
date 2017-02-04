<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends CommonController {
    public function index(){
    	$users = D("User")->select();
    	$this->assign("users",$users);
    	$this->display();
    }
}

?>