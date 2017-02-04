<?php
namespace Admin\Controller;
use Think\Controller;
class MenuController extends CommonController {
    public function index(){
    	
    	$menu = D("Menu")->select();
    	$this->assign("menus",$menu);
        $this->display();
    	    
    }

    public function add(){
    	if($_POST){
    		if(!isset($_POST['menuname']) || !$_POST['menuname']){
    			return show(0,"请填写菜单名");
    		}
    		if(!isset($_POST['menumodule']) || !$_POST['menumodule']){
    			return show(0,"请填写模块名");
    		}
    		if(!isset($_POST['menucontroller']) || !$_POST['menucontroller']){
    			return show(0,"请填写控制器名");
    		}
    		if(!isset($_POST['menuaction']) || !$_POST['menuaction']){
    			return show(0,"请填写方法名");
    		}

        

    		$post['name'] = $_POST['menuname'];
    		$post['m'] = $_POST['menumodule'];
    		$post['c'] = $_POST['menucontroller'];
    		$post['a'] = $_POST['menuaction'];
    		$post['level'] = $_POST['menulevel'];
    		if($_POST['menuid']){
                $this->editSave($post);
            }
            exit;

            $post['create_time'] = time();

            
    		$res = D("Menu")->insert($post);

    		if(!$res){
    			return show(0,"新增菜单失败");
    		}

    		return show(1,"新增菜单成功");
    	}
    	$this->display();
    }

    public function edit(){
        if($_GET){
            $editMenu = D("Menu")->find($_GET['id']);
        }
        $this->assign("editMenu",$editMenu);
        $this->display();
    }

    public function editSave($post){
        
        $post['update_time'] = time();
        $res = D("Menu")->UpdateMenu($_POST['menuid'],$post);
        if($res){
            return show(1,"菜单已编辑");
        }else{
            return show(0,"编辑出错");
        }
    }
}

?>
