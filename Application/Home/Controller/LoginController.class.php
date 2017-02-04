<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){   	
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
		$user = D("User")->find($_POST['username']);

		if($_POST['username'] != $user['username']){
			return show(0,"用户名错误");
		}

		if(getMd5Password($_POST['password']) != $user['password']){
			return show(0,"密码错误");
		}
		
		session('hostUser',$user);
		return show(1,'欢迎登录',$_SESSION['URL']['CURRENT']);
    }

    public function logout(){
    	session('hostUser',null);
    	if(session_start()){
            redirect($_SESSION["URL"]['CURRENT']);
        }else{
    		redirect('./index.php');	
    	}
    }


    public function register(){
    	if($_GET){
	    	$res = D('User')->find($_GET['uid']);
	    	if($res){
	    		exit("用户已存在");
	    	}else{
	    		exit("0");
	    	}
	    }
	    if($_POST){
	    	$user['username'] = $_POST['user'];
	    	$user['password'] = getMd5Password($_POST['passwd']);
	    	$user['qq'] = $_POST['qq'];
	    	$res = D("User")->insert($user);
	    	if($res){
	    		session("hostUser",D("User")->find($user['username']));
	    		redirect("./index.php");
	    	}
	    }
    }
}

?>