<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
    	if(session("adminUser")){
    		redirect("./admin.php");
    	}
    	$this->display();
    }

    public function check(){
    	if($_POST){
			if(!trim($_POST['username'])){
				return show(0,"用户名不能为空");
			}
			if(!trim($_POST['password'])){
				return show(0,"密码不能为空");
			}
		}
		$user = D("Login")->find($_POST['username']);
		
		if(getMd5Password($_POST['password']) != $user['password']){
			return show(0,"密码错误");
		}
		
		session('adminUser',$user);
		//D("Login")->adminLastLoginTime($_POST['username']);
		return show(1,'欢迎登录');

    }

    public function logout(){
    	session('adminUser',null);
    	redirect('./admin.php?c=login');	
    }

}

?>

