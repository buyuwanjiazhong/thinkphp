<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="./Public/sb/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="./Public/sb/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./Public/sb/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="./Public/sb/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    
    <link href="./Public/sb/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    
    

    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>


<body>

    <div id="wrapper">

        <?php
 $menu = D("Menu")->select(); $newscat = D("NewsCat")->select(); ?>
<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">SB Admin v2.0</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li class="divider"></li>
                        <li><a href="./admin.php?c=login&a=logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="./admin.php"><i class="fa fa-dashboard fa-fw"></i>后台首页</a>
                        </li>
                        <?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i; if($menu["id"] == 3): ?><li>
                                    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i><?php echo ($menu["name"]); ?><span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <?php if(is_array($newscat)): $i = 0; $__LIST__ = $newscat;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cat): $mod = ($i % 2 );++$i;?><li>
                                                <a href="./admin.php?c=<?php echo ($menu["c"]); ?>&catid=<?php echo ($cat["id"]); ?>"><?php echo ($cat["catname"]); ?></a>
                                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </ul>
                                    <!-- /.nav-second-level -->
                                </li>
                            <?php else: ?>
                                <li>
                                    <a href="./admin.php?c=<?php echo ($menu["c"]); ?>"><i class="fa fa-table fa-fw"></i><?php echo ($menu["name"]); ?></a>
                                </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        
                        
                        
                        
                       
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>



        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">添加文章</h1>
                    </div>
                <form id="sb-admin-form">
                    <div>
                        <label for="inputname" class="col-sm-1 control-label" style="font-size:20px;">标题:</label>
                        <div class="form-group">
                            <input type="text" class="form-control" style="width:300px;" placeholder="Enter text" name="newsname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputname" class="col-sm-1 control-label" style="font-size:20px;">分类:</label>
                        <select name="catid" style="width:300px;" class="form-control">                            
                            <?php if(is_array($catinfos)): $i = 0; $__LIST__ = $catinfos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cat): $mod = ($i % 2 );++$i;?><option value="<?php echo ($cat["catid"]); ?>" <?php if($matchcatid[catid] == $cat[catid]): ?>selected="selected"<?php endif; ?>><?php echo ($cat["catname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                    <div>
                        <div>
                        <label for="inputname" class="col-sm-1 control-label" style="font-size:20px;">作者:</label>
                        <div class="form-group">
                            <input type="text" class="form-control" style="width:300px;" placeholder="Enter text" name="newsauthor">
                        </div>
                    </div>
                    <div>
                        <label for="inputname" class="col-sm-1 control-label" style="font-size:20px;">描述:</label>
                        <div class="form-group">                   
                            <textarea style="width:300px;" class="form-control" rows="5" name="description"></textarea>
                        </div>
                    </div>

                    
                    <div class="form-group">
                        <label for="inputname" class="col-sm-1 control-label" style="font-size:20px;">封面:</label>
                            <input id="file_upload"  type="file" multiple="true" >
                            <img style="display: none" id="upload_org_code_img" src="" width="150" height="150">
                            <input id="file_upload_image" name="thumb" type="hidden" multiple="true" value="">
                    </div>
                    <div class="form-group">
                        <script id="editor" name="newscontent" type="text/plain" style="width:756px;height:500px;"></script>
                    </div>
                    <button type="button" class="btn btn-primary btn-lg" id='sb-submit'>提交</button>
                </form>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="./Public/sb/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="./Public/sb/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="./Public/sb/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="./Public/sb/dist/js/sb-admin-2.js"></script>
    <script src="./Public/sb/js/general.js"></script>
    <script src="./Public/sb/js/uploadify/jquery.uploadify.min.js"></script>
    <script src="./Public/sb/js/layer/layer.js"></script>
    <script src="./Public/sb/js/dialog.js"></script>
    <script type="text/javascript" src="./Public/sb/js/utf8-php/ueditor.all.js"></script>
    <script type="text/javascript" charset="utf-8" src="./Public/sb/js/utf8-php/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="./Public/sb/js/utf8-php/ueditor.all.min.js"> </script>
    <script>
        var ue = UE.getEditor('editor');
    </script>

    <script>
        var SCOPE={
            'add_url' : './admin.php?c=news&a=add',
            'jump_url' : './admin.php?c=news',
            'ajax_upload_swf' : './Public/sb/js/uploadify/uploadify.swf',
            'ajax_upload_image_url' : './admin.php?c=image&a=ajaxuploadimage',
        }
    </script> 

</body>

</html>