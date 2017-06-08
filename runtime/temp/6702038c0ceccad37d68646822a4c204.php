<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:61:"C:\myweb\TP\public/../application/admin\view\login\login.html";i:1496922680;}*/ ?>
﻿<!DOCTYPE html>
<!--
Beyond Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3
Version: 1.0.0
Purchase: http://wrapbootstrap.com
-->

<html xmlns="http://www.w3.org/1999/xhtml">
<!--Head-->
<head>
    <meta charset="utf-8" />
    <title><?php echo \think\Lang::get('login'); ?></title>

    <meta name="description" content="login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    <!--Basic Styles-->
        <link href="__CSS__/bootstrap.css" rel="stylesheet">
    <link href="__CSS__/font-awesome.css" rel="stylesheet">
    <link href="__CSS__/weather-icons.css" rel="stylesheet">
    <link href="__CSS__/ion.calendar.css" rel="stylesheet" >

    <!--Beyond styles-->
    <link id="beyond-link" href="__CSS__/beyond.css" rel="stylesheet" type="text/css">
    <link href="__CSS__/demo.css" rel="stylesheet">
    <link href="__CSS__/typicons.css" rel="stylesheet">
    <link href="__CSS__/animate.css" rel="stylesheet">
    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
      <script src="__JS__/skins.min.js"></script>
</head>
<!--Head Ends-->
<!--Body-->
<body>
    <div class="login-container animated fadeInDown">
        <form action="login" method='post'>
        <div class="loginbox bg-white">
            <div class="loginbox-title"><?php echo \think\Lang::get('login'); ?></div>
            <!--
            <div class="loginbox-social">
                <div class="social-title ">Connect with Your Social Accounts</div>
                <div class="social-buttons">
                    <a href="" class="button-facebook">
                        <i class="social-icon fa fa-facebook"></i>
                    </a>
                    <a href="" class="button-twitter">
                        <i class="social-icon fa fa-twitter"></i>
                    </a>
                    <a href="" class="button-google">
                        <i class="social-icon fa fa-google-plus"></i>
                    </a>
                </div>
            </div>
            <div class="loginbox-or">
                <div class="or-line"></div>
                <div class="or">OR</div>
            </div>
            -->
            <div class="loginbox-textbox">
                <input type="text" name='username' class="form-control" required="required"placeholder="Username" />
            </div>
            <div class="loginbox-textbox">
                <input type="text" name="password" class="form-control" required="required" placeholder="Password" />
            </div>
           <div class="loginbox-textbox">
                    <input class="form-control" style="display: inline-block;width:96px;padding: 0px;" required name="captcha" type="text">
                    <img src="<?php echo captcha_src(); ?>" onclick="this.src='<?php echo captcha_src(); ?>?'+Math.random();" width="120" style="display: inline-block;padding: 0px; cursor:pointer; height: 34px" alt="captcha" />
               
            </div>
            
            
            <div class="loginbox-submit" style="margin-top 10px">
                <input type="submit" class="btn btn-primary btn-block" value="<?php echo \think\Lang::get('login'); ?>">
            </div>
            <div class="loginbox-forgot" style="clear: both">
                <a href="" style=" display: inline-block;width: 40%;text-align: center"><?php echo \think\Lang::get('forgot_password'); ?></a>
                <a href="register.html" style="display: inline-block;width: 40%;text-align: center"><?php echo \think\Lang::get('sign_up'); ?></a>
            </div>
            
        </div>
       
        </form>
    </div>

    <!--Basic Scripts-->
    <script src="__JS__/js/jquery-2.0.3.min.js"></script>
    <script src="__JS__/js/bootstrap.min.js"></script>

    <!--Beyond Scripts-->
    <script src="__JS__/js/beyond.js"></script>

    <!--Google Analytics::Demo Only-->
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date(); a = s.createElement(o),
            m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'http://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-52103994-1', 'auto');
        ga('send', 'pageview');

    </script>
</body>
<!--Body Ends-->
</html>
