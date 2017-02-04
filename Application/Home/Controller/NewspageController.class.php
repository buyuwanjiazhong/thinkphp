<?php
namespace Home\Controller;
use Think\Controller;
class NewspageController extends CommonController {
    public function index(){    

    	$_SESSION['URL']['CURRENT'] = $_SERVER['REQUEST_URI'];
        if($_GET){
	        $article = D("News")->homeFind($_GET['id']);
	        $content = D("NewsContent")->find($_GET['id']);
	        $article['content'] = htmlspecialchars_decode($content['content']);
	        
	        $comment = D("NewsComment")->select($_GET['id']);
            $article['countNum'] = count($comment);

	        $newsid['id'] = $_GET['id'];

            $this->assign("article",$article);
	        $this->assign("newsid",$newsid);
	        $this->assign("comment",$comment);
	    }

    	$this->display();
    }

    public function comment(){
    	if($_POST){
    		$_POST['create_time'] = time();
    		$res = D("NewsComment")->addComment($_POST);
    		if($res){
    			return show(1,"已评论",$_SESSION['URL']['CURRENT']);
    		}else{
    			return show(0,"评论出错");
    		}
    	}
    }

}
?>