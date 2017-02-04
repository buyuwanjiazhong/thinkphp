<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
    	
    	$this->display();
    }

    public function delete(){
    	if($_POST){
	    	$p = '/c=([a-z]+)/';
	    	preg_match($p, $_SERVER["HTTP_REFERER"],$match);

	    	$id="id";
	    	if($match[1] == "news"){
	    		$id="news_id";
	    	}

	    	$data['status'] = -1;
	    	$res = M($match[1])->where($id."=".$_POST['id'])->save($data);
	    	if($res){
	    		return show(1,"已删除",$_SERVER["HTTP_REFERER"]);
	    	}else{
	    		return show(0,"删除出错");
	    	}
	    }
    }
}

?>