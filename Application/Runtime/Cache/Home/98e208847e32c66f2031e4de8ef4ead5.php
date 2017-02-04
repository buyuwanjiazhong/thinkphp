<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<title>Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="./Application/Home/View/Index/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->

<link href="./Application/Home/View/Index/css/style.css" rel='stylesheet' type='text/css' />	
<script src="./Application/Home/View/Index/js/jquery-1.11.1.min.js"></script>
<script src="./Application/Home/View/Index/js/bootstrap.min.js"></script>
<!-- animation-effect -->
<link href="./Application/Home/View/Index/css/animate.min.css" rel="stylesheet"> 
<script src="./Application/Home/View/Index/js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!-- //animation-effect -->
</head>
<?php
 $userinfo = $_SESSION['hostUser']; ?>
<body>
<div class="header" id="ban" >
		<div class="container" >
			
			<div class="header_right wow fadeInLeft animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInLeft; ">
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					<nav class="link-effect-7" id="link-effect-7">
						<ul class="nav navbar-nav">
							<?php if($userinfo["status"] == 1): ?><li><a>你好,<?php echo ($userinfo["username"]); ?></a></li><?php endif; ?>
							<li <?php if(empty($pageCatid['catid']) == true): ?>class="active act"<?php endif; ?>><a href="./index.php">Home</a></li>
							<?php if(is_array($newscat)): $i = 0; $__LIST__ = $newscat;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cat): $mod = ($i % 2 );++$i;?><li <?php if($pageCatid['catid'] == $cat[catid]): ?>class="active act"<?php endif; ?>><a href="./index.php?c=Paging&catid=<?php echo ($cat["catid"]); ?>"><?php echo ($cat["catname"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
							<?php if($userinfo["status"] == 1): ?><li><a href="./index.php?c=login&a=logout">退出</a></li>
							<?php else: ?>
								<li><a href="./index.php?c=login">登录|注册</a></li><?php endif; ?>

						</ul>

					</nav>
				</div>
				

				<!-- /.navbar-collapse -->
			</nav>
			</div>
				
		</div>
	</div>
		
			<div class="clearfix"> </div>	
		</div>
	</div>
	<!--start-main-->
	

<div class="banner-1">

</div>

	<!-- technology-left -->
	<div class="technology">
	<div class="container">
		<div class="col-md-9 technology-left">
			<div class="agileinfo">

		  <h2 class="w3">SEARCH</h2>

		  <?php if(is_array($search)): $i = 0; $__LIST__ = $search;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$news): $mod = ($i % 2 );++$i;?><div class="wthree">
				 <div class="col-md-6 wthree-left wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
					<div class="tch-img">
						<a href="./index.php?c=newspage&id=<?php echo ($news["news_id"]); ?>"><img src="<?php echo ($news["thumb"]); ?>" class="img-responsive" alt=""></a>
					</div>
				 </div>
				 <div class="col-md-6 wthree-right wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
						<h3><a href="./index.php?c=newspage&id=<?php echo ($news["news_id"]); ?>"><?php echo ($news["newsname"]); ?></a></h3>
						<h6>BY <a><?php echo ($news["newsauthor"]); ?>&nbsp;&nbsp;</a><?php echo (date("Y-m-d",$news["create_time"])); ?></h6>
							<p><?php echo ($news["description"]); ?></p>
							<div class="bht1">
								<a href="./index.php?c=newspage&id=<?php echo ($news["news_id"]); ?>">Read More</a>
							</div>
							
							<div class="clearfix"></div>
					
				 </div>
					<div class="clearfix"></div>
			</div><?php endforeach; endif; else: echo "" ;endif; ?>
			<?php echo ($pageRes); ?>  

						
				
				<div class="clearfix"></div>
			</div>
		</div>
		<!-- technology-right -->
		<?php
 $popFive = D("News")->getPopFive(); ?>

<div class="col-md-3 technology-right">
				
				
				<div class="blo-top1">
							
					<div class="tech-btm">
					<div class="search-1 wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
							<form action="./index.php?c=search" method="post">
								<input type="search" name="Search" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" required="">
								<input type="submit" value=" ">
							</form>
						</div>
					<h4>Popular Posts </h4>
						<?php if(is_array($popFive)): $i = 0; $__LIST__ = $popFive;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pop): $mod = ($i % 2 );++$i;?><div class="blog-grids wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
								<div class="blog-grid-left">
									<a href="./index.php?c=newspage&id=<?php echo ($pop['news_id']); ?>"><img src="<?php echo ($pop['thumb']); ?>" class="img-responsive" alt=""></a>
								</div>
								<div class="blog-grid-right">
									
									<h5><a href="./index.php?c=newspage&id=<?php echo ($pop['news_id']); ?>"><?php echo ($pop['newsname']); ?></a> </h5>
								</div>
								<div class="clearfix"> </div>
							</div><?php endforeach; endif; else: echo "" ;endif; ?>
					
					
					
				</div>
				
			
		</div>
		<div class="clearfix"></div>
		<!-- technology-right -->
	</div>
</div>
<div class="footer">
		<div class="container">
			<div class="col-md-4 footer-left wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
				<h4>About Me</h4>
				<p>这是我个人建立的博客类网站</p>
				
					<div class="bht1">
						<a href="">阅读简历</a>
					</div>
			</div>
			<div class="col-md-4 footer-middle wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
			<h4>特别感谢</h4>
			<div class="mid-btm">
				<p>本站前端模板来自素材网</p>
				<a target="_blank" href="http://sc.chinaz.com/">http://sc.chinaz.com/</a>
			</div>
			
				<p>后端模板来自SB Admin 2</p>
				<a target="_blank" href="https://startbootstrap.com/">https://startbootstrap.com/</a>
		
			</div>
			<div class="col-md-4 footer-right wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
				<h4>声明</h4>
				<p>本站内容不作任何商业用途，如本站模板内容侵犯到您的权益，请与我联系，我将及时更正</p>
						<div class="name">
							<form action="#" method="post">
								<p>QQ:411183472</p>
								<p>邮箱:411183472@qq.com</p>
							</form>
						
						</div>	
						
							<div class="clearfix"> </div>
					
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="copyright wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
				<div class="container">
					<p>Copyright &copy; 2016.Company name All rights reserved.<a target="_blank" href="http://sc.chinaz.com/moban/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a></p>
				</div>
			</div>
</body>
</html>