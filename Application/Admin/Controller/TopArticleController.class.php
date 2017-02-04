<?php
namespace Admin\Controller;
use Think\Controller;
class TopArticleController extends CommonController {
    public function index(){
    	$article = D("TopArticle")->select();
    	$this->assign("article",$article);
    	$this->display();
    }

    public function edit(){

      $article = D("TopArticle")->select();
      $this->assign("article",$article);
      
   		$adminCat = D("NewsCat")->select();
      $getCatId['catid'] = $_GET['catid'];
      $getCatId['id'] = $_GET['id'];
      $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
      $pageSize = 3;

      $catnews = D("News")->getNews($getCatId['catid'],$page,$pageSize);
      $count = D("News")->getNewsCount($getCatId);
      
      $res = new \Think\Page($count,$pageSize);
      $pageRes = $res->show();
      $this->assign("getCatId",$getCatId);
      $this->assign("pageRes",$pageRes);
      $this->assign("catnews",$catnews);
      $this->assign("adminCat",$adminCat);
    	$this->display();
    }

    public function editTop(){
      if($_POST){
        
        $res = D("TopArticle")->update($_POST);
        if($res){
          return show(1,"已置顶");
        }else{
          return show(0,"出错");
        }
      }
    }

    public function editChange(){
      if($_POST){
          $getCatId['catid'] = $_POST['catid'];
          $getCatId['id'] = $_POST['id'];
      };
      dump($getCatId);
      exit;
    }
}

?>