<?php
namespace Home\Controller;
use Think\Controller;
class SearchController extends CommonController {
    public function index(){ 

    	if($_POST){
    		$search = D("News")->search($_POST['Search']);
    		$this->assign("search",$search);
    	}

    	$this->display();
    }
}

?>