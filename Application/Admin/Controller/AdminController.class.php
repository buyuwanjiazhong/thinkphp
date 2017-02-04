<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends CommonController {
    public function index(){

    	$users = D("Admin")->select();
    	$this->assign("users",$users);
        $this->display();
    }

    public function add(){
    	if($_POST){
    		if(!$_POST['adminname'] || !isset($_POST['adminname'])){
    			return show(0,"用户名不能为空");
    		}

            if($_POST['id']){
                $this->updateAdmin();
            }
    		$post['adminName'] = $_POST['adminname'];
    		if(!$_POST['adminpassword'] || !isset($_POST['adminpassword'])){
    			return show(0,"密码不能为空");
    		}
    		$post['password'] = getMd5Password($_POST['adminpassword']);
    		$post['adminLevel'] = $_POST['adminlevel'];
    		$res = D("User")->insert($post);
    		if(!$res){
    			return show(0,"新增管理员失败");
    		}

    		return show(1,"新增管理员成功");

    	}
    	$this->display();
    }

    public function edit(){
        if($_GET){
            $editAdmin = D("Admin")->findEditAdmin($_GET['id']);
            $this->assign("editAdmin",$editAdmin);
        }
        $this->display();
    }

    public function updateAdmin(){
        $post['adminName'] = $_POST['adminname'];
        $post['adminLevel'] = $_POST['adminlevel'];
        $id = $_POST['id'];
        $res = D("Admin")->updateAdmin($id,$post);
        if($res){
            return show(1,"已重置权限");
        }else{
            return show(0,"重置出错");
        }
    }
}

?>