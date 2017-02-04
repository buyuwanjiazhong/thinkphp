<?php
namespace Home\Controller;
use Think\Controller;
class PagingController extends CommonController {
    public function index(){    
        $_SESSION['URL']['CURRENT'] = $_SERVER['REQUEST_URI'];

        $pageCatid['catid'] = $_GET['catid'];

    	$page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = 3;

        $catnews = D("News")->getNews($_GET['catid'],$page,$pageSize);
        $count = D("News")->getNewsCount($_GET['catid']);
        
        $res = new \Think\Page($count,$pageSize);
        $pageRes = $res->show();

        $this->assign("catnews",$catnews);
        $this->assign("pageRes",$pageRes);

    	$this->assign("pageCatid",$pageCatid);
    	$this->display();
    }
}

?>