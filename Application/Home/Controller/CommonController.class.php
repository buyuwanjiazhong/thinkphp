<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {

	public function __construct(){

		parent::__construct();
		$newscat = D("NewsCat")->select();
        $this->assign("newscat",$newscat);

	}
}
?>