<?php
namespace Admin\Controller;
use Think\Controller;
class NewsController extends CommonController {
    public function index(){
		if($_GET['catid']){
            $catinfo = D("NewsCat")->find($_GET['catid']);
            $this->assign("catinfo",$catinfo);
            
            $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
            $pageSize = 3;

            $catnews = D("News")->getNews($_GET['catid'],$page,$pageSize);
            $count = D("News")->getNewsCount($_GET['catid']);
            
            $res = new \Think\Page($count,$pageSize);
            $pageRes = $res->show();

            $this->assign("catnews",$catnews);
            $this->assign("pageRes",$pageRes);

        }

    	$this->display();
    }

    public function add(){
        
        $p = '/catid=([0-9])/';
        preg_match($p, $_SERVER["HTTP_REFERER"],$match);
        $matchcatid['catid'] = $match[1];

        $this->assign("matchcatid",$matchcatid);

        $catinfos = D("NewsCat")->select();
        $this->assign("catinfos",$catinfos);
    	if($_POST){
    		if(!isset($_POST['newsname']) || !$_POST['newsname']){
    			return show(0,"请填写新闻标题");
    		}
    		if(!isset($_POST['newsauthor']) || !$_POST['newsauthor']){
    			return show(0,"请填写作者");
    		}
    		if(!isset($_POST['description']) || !$_POST['description']){
    			return show(0,"请填写新闻描述");
    		}
    		if(!isset($_POST['thumb']) || !$_POST['thumb']){
                return show(0,"请上传封面图片");
            }
    		if(!isset($_POST['newscontent']) || !$_POST['newscontent']){
    			return show(0,"请填写新闻内容");
    		}
            if($_POST['news_id']){
                $this->updateNew();
            }

            $content['content'] = $_POST['newscontent'];
            unset($_POST['newscontent']);
            $_POST['catid'] = intval($_POST['catid']);

    		$res = D("News")->insert($_POST);
            $content['news_id'] = $res;
            if(!$res){
                return show(0,"添加文章信息时出错");
            }else{
                $res = D("NewsContent")->insert($content);
                if(!$res){
                    return show(0,"添加文章内容时出错");
                }else{
                    return show(1,"文章已添加",$_POST['catid']);
                }
            }
    	}
    	$this->display();
    }

    public function edit(){
        $catinfos = D("NewsCat")->select();
        $this->assign("catinfos",$catinfos);
        if($_GET){
            $editNew = D("News")->find(intval($_GET['id']));
            if($editNew){
                $res = D("NewsContent")->find(intval($editNew['news_id']));
            }
            $editNew['content'] = htmlspecialchars_decode($res['content']);
            $this->assign("editNew",$editNew);
        }
        $this->display();
    }

    public function updateNew(){
        $data['content'] = htmlspecialchars($_POST['newscontent']);
        unset($_POST['newscontent']);

        $_POST['update_time'] = time();
        $res = D("News")->updateNews($_POST);
        if($res){
            $data['update_time'] = time();
            $res = D("NewsContent")->updateNewsContent(intval($_POST['news_id']),$data);
            if($res){
                return show(1,"已编辑文章",$_POST['catid']);
            }else{
                return show(0,"编辑文章内容出错");
            }
        }else{
            return show(0,"编辑文章信息出错");
        }
        exit;
    }
}

?>