<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){ 
        $_SESSION['URL']['CURRENT'] = $_SERVER['REQUEST_URI'];

    	$articles = $this->selectHomeArticles();
        $topPics = $this->topThreePics();

        $this->assign("topPics",$topPics);
        $this->assign("articles",$articles);
    	$this->display();
    }

    public function login(){
    	$this->display();
    }

    public function selectHomeArticles(){
        $titles = D("TopArticle")->select();
        for($i=0; $i<7; $i++){
            $articleId[] = $titles[$i]['news_id'];
        }
        $newsId = implode(",",$articleId);
        
        $res = D("News")->getHomepageNews($newsId);
        
        
        $countRes = count($res);
        $articles = array();
        for($i=0;$i<7;$i++){
            for($j=0;$j<$countRes;$j++){
                if($articleId[$i] == $res[$j]['news_id']){
                    $articles[$i] = $res[$j];
                }
            }
        }

        return $articles;
    }

    public function topThreePics(){
        $pics = D("News")->getTopThreePics();
        return $pics;
    }
}