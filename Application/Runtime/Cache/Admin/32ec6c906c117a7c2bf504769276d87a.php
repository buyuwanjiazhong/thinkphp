<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<title>简洁大气快速登录注册模板</title> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="./Application/Admin/View/Login/css/login2.css" rel="stylesheet" type="text/css" />

</head>
<body>
<body>
<h1>简洁大气快速登录注册模板<sup>2015</sup></h1>

<div class="login" style="margin-top:50px;">
    
    <div class="header">
        <div class="switch" id="switch"><a class="switch_btn_focus" id="switch_qlogin" href="javascript:void(0);" tabindex="7">快速登录</a>
        </div>
    </div>    
  
    
    <div class="web_qr_login" id="web_qr_login" style="display: block; height: 235px;">    

            <!--登录-->
            <div class="web_login" id="web_login">
               
               
               <div class="login-box">
    
            
            <div class="login_form">
                <form  name="loginform" accept-charset="utf-8" id="login_form" class="loginForm"><input type="hidden" name="did" value="0"/>
               <input type="hidden" name="to" value="log"/>
                <div class="uinArea" id="uinArea">
                <label class="input-tips" for="u">帐号：</label>
                <div class="inputOuter" id="uArea">
                    
                    <input type="text" id="u" name="username" class="inputstyle"/>
                </div>
                </div>
                <div class="pwdArea" id="pwdArea">
               <label class="input-tips" for="p">密码：</label> 
               <div class="inputOuter" id="pArea">
                    
                    <input type="password" id="p" name="password" class="inputstyle"/>
                </div>
                </div>
               
                <button class="btn btn-lg btn-primary btn-block" type="button" onclick="login.check()">登录</button>
              </form>
           </div>
           
                </div>
               
            </div>
            <!--登录end-->
  </div>

  <!--注册-->
    
    <!--注册end-->
</div>
<div class="jianyi">*推荐使用ie8或以上版本ie浏览器或Chrome内核浏览器访问本站</div>
    <script src="./Public/sb/js/jquery-3.1.1.min.js"></script>
    <script src="./Application/Admin/View/Login/images/login.js"></script>
    <script src="./Public/sb/js/layer/layer.js"></script>
    <script src="./Public/sb/js/dialog.js"></script>

</body></html>