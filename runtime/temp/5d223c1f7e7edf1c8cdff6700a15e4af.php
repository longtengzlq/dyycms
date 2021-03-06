<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:62:"C:\myweb\TP\public/../application/admin\view\setting\edit.html";i:1496959613;s:63:"C:\myweb\TP\public/../application/admin\view\common\header.html";i:1496919045;s:61:"C:\myweb\TP\public/../application/admin\view\common\left.html";i:1496908348;}*/ ?>

	<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <title><?php echo $setting['site_name']; ?></title>
    <meta name="description" content="Dashboard">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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

   	
</head>
<body>
	<!-- 头部 -->
	<div class="navbar">
    <div class="navbar-inner">
        <div class="navbar-container">
            <!-- Navbar Barnd -->
            <div class="navbar-header pull-left">
                <a href="#" class="navbar-brand">
                    <small>
                            <img src="__IMG__/logo.png" alt="">
                        </small>
                </a>
            </div>
            <!-- /Navbar Barnd -->
            <!-- Sidebar Collapse -->
            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="collapse-icon fa fa-bars"></i>
            </div>
            <!-- /Sidebar Collapse -->
            <!-- Account Area and Settings -->
            <div class="navbar-header pull-right">
                <div class="navbar-account">
                    <ul class="account-area">
                        <li><a class="login-area " style='padding: auto'  href="<?php echo url($current_action,array('lang'=>'zh-cn')); ?>">
                                <div style="height: 45px;line-height: 45px;padding: 0px;margin: 0px;margin-top: -10px; color: white;">    简体中文</div>
                            </a>
                            <a class="login-area " href="<?php echo url($current_action,array('lang'=>'en-us')); ?>">
                                <div style="height: 45px;line-height: 45px;padding: 0px;margin: 0px;margin-top: -10px; color: white;">  English</div>
                            </a>
                        </li>
                        <li>
                            <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                <div class="avatar" title="View your public profile">
                                    <img src="__IMG__/adam-jansen.jpg">
                                </div>
                                <section>
                                    <h2><span class="profile"><span><?php echo $login_username; ?></span></span></h2>
                                </section>
                            </a>
                            
                            
                            <!--Login Area Dropdown-->
                            <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area ">
                                
                                <li class="username"><a>{session.username}</a></li>
                                <li class="dropdown-footer" style="text-align: center">
                                    <a href="<?php echo url('login/logout'); ?>">
                                            <?php echo \think\Lang::get('logouts'); ?>
                                        </a>
                                </li>
                                <li class="dropdown-footer" style="text-align: center">
                                    <a href="<?php echo url('index/edit',array('id'=>\think\Request::instance()->session('uid'))); ?>">
                                            <?php echo \think\Lang::get('change_password'); ?>
                                        </a>
                                </li>
                            </ul>
                            <!--/Login Area Dropdown-->
                        </li>
                        <!-- /Account Area -->
                        <!--Note: notice that setting div must start right after account area list.
                            no space must be between these elements-->
                        <!-- Settings -->
                    </ul>
                </div>
            </div>
            <!-- /Account Area and Settings -->
        </div>
    </div>
</div>

	<!-- /头部 -->
	<div class="main-container container-fluid">
		<div class="page-container">
			            <!-- Page Sidebar -->
             <div class="page-sidebar" id="sidebar">
                <!-- Page Sidebar Header-->
                <div class="sidebar-header-wrapper">
                    <input class="searchinput" type="text">
                    <i class="searchicon fa fa-search"></i>
                    <div class="searchhelper">Search Reports, Charts, Emails or Notifications</div>
                </div>
                <!-- /Page Sidebar Header -->
                <!-- Sidebar Menu -->
                <ul class="nav sidebar-menu">
                    <!--Dashboard-->
                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-user"></i>
                            <span class="menu-text"><?php echo \think\Lang::get('administrator'); ?></span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                           <li>
                                <a href="<?php echo url('admin/lst'); ?>">
                                    <span class="menu-text">
                                        <?php echo \think\Lang::get('admin_list'); ?>                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>                            
                    </li> 
                    
                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-paper-plane"></i>
                            <span class="menu-text"><?php echo \think\Lang::get('authority_manage'); ?></span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                           <li>
                                <a href="<?php echo url('authGroup/lst'); ?>">
                                    <span class="menu-text">
                                        <?php echo \think\Lang::get('auth_group_list'); ?>                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                             <li>
                                <a href="<?php echo url('authRule/lst'); ?>">
                                    <span class="menu-text">
                                        <?php echo \think\Lang::get('auth_rule_list'); ?>                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo url('authGroupAccess/lst'); ?>">
                                    <span class="menu-text">
                                        <?php echo \think\Lang::get('user_auth_manage'); ?>                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>                            
                    </li> 

                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-folder-open"></i>
                            <span class="menu-text"><?php echo \think\Lang::get('category'); ?></span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo url('category/lst',array('language_id'=>'1')); ?>">
                                    <span class="menu-text">
                                        <?php echo \think\Lang::get('category_list_ch'); ?>                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo url('category/lst',array('language_id'=>'2')); ?>">
                                    <span class="menu-text">
                                        <?php echo \think\Lang::get('category_list_en'); ?>                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                            
                        </ul>                            
                    </li> 
                     <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-file-text"></i>
                            <span class="menu-text"><?php echo \think\Lang::get('article'); ?></span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo url('admin/article/lst',array('language_id'=>'1')); ?>">
                                    <span class="menu-text">
                                        <?php echo \think\Lang::get('article_list_ch'); ?>                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo url('admin/article/lst',array('language_id'=>'2')); ?>">
                                    <span class="menu-text">
                                        <?php echo \think\Lang::get('article_list_en'); ?>                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>                            
                    </li> 
                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-rocket"></i>
                            <span class="menu-text"><?php echo \think\Lang::get('model'); ?></span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo url('model_type/lst',array('language_id'=>'1')); ?>">
                                    <span class="menu-text">
                                        <?php echo \think\Lang::get('model_list'); ?>
                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                            
                        </ul>                            
                    </li> 

                    
                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-link"></i>
                            <span class="menu-text"><?php echo \think\Lang::get('links'); ?></span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo url('links/lst',array('language_id'=>'1')); ?>">
                                    <span class="menu-text">
                                        <?php echo \think\Lang::get('ch_links'); ?>                                   </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo url('links/lst',array('language_id'=>'2',)); ?>">
                                    <span class="menu-text">
                                        <?php echo \think\Lang::get('en_links'); ?>                                        </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>                            
                    </li> 

                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-gear"></i>
                            <span class="menu-text"> <?php echo \think\Lang::get('system'); ?>  </span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo url('setting/edit',array('language_id'=>'1')); ?>">
                                    <span class="menu-text">
                                        <?php echo \think\Lang::get('set_china'); ?>                                  </span>
                                    <i class="menu-expand"></i>
                                </a>
                                <a href="<?php echo url('setting/edit',array('language_id'=>'2')); ?>">
                                    <span class="menu-text">
                                        <?php echo \think\Lang::get('set_english'); ?>                                  </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>                            
                    </li>                        
                    
                </ul>
                <!-- /Sidebar Menu -->
            </div>
            <!-- /Page Sidebar -->
            <!-- Page Content -->
            <div class="page-content">
                <!-- Page Breadcrumb -->
                <div class="page-breadcrumbs">
                    <ul class="breadcrumb">
                                        <li class="active"><?php echo \think\Lang::get('system'); ?></li>
                                        </ul>
                </div>
                <!-- /Page Breadcrumb -->

                <!-- Page Body -->
                <div class="page-body">
                    <form class="form-horizontal" role="form" action="" enctype="multipart/form-data"  method="post">
                        <input name='id'  value="<?php echo $or_data['id']; ?>" type="hidden">
                        <div class="form-group">
                            <label for="site_name" class="col-sm-2 control-label no-padding-right"><?php echo \think\Lang::get('site_title'); ?></label>
                            <div class="col-sm-6">
                                <input class="form-control" id="site_name" placeholder="" name="site_name" value="<?php echo $or_data['site_name']; ?>"  type="text">
                            </div>
                           
                        </div>
                        
                        <div class="form-group">
                            <label for="site_domain" class="col-sm-2 control-label no-padding-right"><?php echo \think\Lang::get('site_domain'); ?></label>
                            <div class="col-sm-3">
                                <input class="form-control" id="site_domain" placeholder="" name="site_domain" value="<?php echo $or_data['site_domain']; ?>" type="text">
                            </div>
                            <label for="site_domain" class="col-sm-3 control-label no-padding-left" style="text-align:left"><?php echo \think\Lang::get('example'); ?>：http://www.mlcms.com/</label>
                            
                        </div>
                        
                         <div class="form-group">
                            <label for="site_switch" class="col-sm-2 control-label no-padding-right"><?php echo \think\Lang::get('site_switch'); ?></label>
                            <div class="col-sm-6">
                                <label>
                                    <input class="checkbox-slider colored-success " id='site_switch' <?php if($or_data['site_switch'] == 1): ?> checked="checked" <?php endif; ?> name="site_switch" type="checkbox">
                                    <span class="text"></span>
                                </label>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label for="site_keywords" class="col-sm-2 control-label no-padding-right"><?php echo \think\Lang::get('site_keywords'); ?></label>
                            <div class="col-sm-6">
                                 <input class="form-control" id="site_keywords" placeholder=""  name="site_keywords"  value="<?php echo $or_data['site_keywords']; ?>" type="text">
                            </div>
                            
                        </div>
                        
                        <div class="form-group">
                            <label for="site_description" class="col-sm-2 control-label no-padding-right"><?php echo \think\Lang::get('site_desciption'); ?></label>
                            <div class="col-sm-6">
                                <textarea name='site_description' id='site_desciption' class="form-control" rows="3"  placeholder="<?php echo $or_data['site_description']; ?>"></textarea>
                               
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label for="site_copyright" class="col-sm-2 control-label no-padding-right"><?php echo \think\Lang::get('copyright'); ?></label>
                            <div class="col-sm-6">
                                <textarea name='site_copyright' id='site_desciption' class="form-control" rows="3" value='<?php echo $or_data['site_copyright']; ?>' placeholder='<?php echo $or_data['site_copyright']; ?>'></textarea>
                               
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label for="site_templet" class="col-sm-2 control-label no-padding-right"><?php echo \think\Lang::get('site_templet'); ?></label>
                            <div class="col-sm-6">                                
                               <select class="form-control" id="site_templet" name="site_templet" style="border-radius:0px;">
                                   <?php if(is_array($templates) || $templates instanceof \think\Collection || $templates instanceof \think\Paginator): $i = 0; $__LIST__ = $templates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$template): $mod = ($i % 2 );++$i;?>
                                    <option value="<?php echo $template; ?>" <?php if($template == $or_data['site_templet']): ?> selected<?php endif; ?>><?php echo $template; ?></option>   
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>                               
                            </div>                            
                        </div>
                        
                        <div class="form-group">
                            <label for="upload_size" class="col-sm-2 control-label no-padding-right"><?php echo \think\Lang::get('upload_size'); ?></label>
                            <div class="col-sm-3">
                                <input class="form-control" id="upload_size" placeholder="" name="upload_size" value="<?php echo $or_data['upload_size']; ?>"  type="text">
                            </div>
                            <p class="help-block col-sm-3 ">KB，    <?php echo \think\Lang::get('default'); ?> 2048 KB(2M )</p>
                            
                        </div>
                        
                        <div class="form-group">
                            <label for="upload_type" class="col-sm-2 control-label no-padding-right"><?php echo \think\Lang::get('upload_type'); ?></label>
                            <div class="col-sm-3">
                                <input class="form-control" id="upload_type" placeholder="" name="upload_type" value="<?php echo $or_data['upload_type']; ?>"  type="text">
                            </div>
                            <p class="help-block col-sm-3 "><?php echo \think\Lang::get('set_type_msg'); ?></p>
                            
                        </div>
                        
                        <div class="form-group">
                            <label for="GD_test" class="col-sm-2 control-label no-padding-right"><?php echo \think\Lang::get('GD_test'); ?></label>
                            <div class="col-sm-6">
                                <label>
                                    <input class="checkbox-slider slider-icon colored-darkorange" id='GD_test' name="GD_test"  <?php if($or_data['GD_test'] == 1): ?> checked="checked" <?php endif; ?> type="checkbox">
                                    <span class="text"></span>
                                </label>
                            </div>
                            
                        </div>
                        
                        <div class="form-group">
                            <label for="GD_test_switch" class="col-sm-2 control-label no-padding-right"><?php echo \think\Lang::get('GD_test_switch'); ?></label>
                            <div class="col-sm-6">
                                <label>
                                    <input class="checkbox-slider colored-success" id='GD_test_switch' name="GD_test_switch" <?php if($or_data['GD_test_switch'] == 1): ?> checked="checked" <?php endif; ?> type="checkbox">
                                    <span class="text"></span>
                                </label>
                            </div>
                            
                        </div>
                        
                         <div class="form-group">
                            <label for="watermart_condition" class="col-sm-2 control-label no-padding-right"><?php echo \think\Lang::get('watermart_condition'); ?></label>
                            <div class="col-sm-6">
                                <input class="form-control" id="watermart_condition" placeholder="" name="watermart_condition"  value="<?php echo $or_data['watermart_condition']; ?>"  type="text">
                            </div>
                           
                        </div>
                        
                         <div class="form-group">
                            <label for="watermark_image" class="col-sm-2 control-label no-padding-right"><?php echo \think\Lang::get('watermark_image'); ?></label>
                            <div class="col-sm-3">
                                <input class="form-control" id="watermark_image" placeholder="" name="watermark_image" value="<?php echo $or_data['watermark_image']; ?>"    type="text">
                            </div>
                            
                        </div>
                        
                         <div class="form-group">
                            <label for="watermark_transparency" class="col-sm-2 control-label no-padding-right"><?php echo \think\Lang::get('watermark_transparency'); ?></label>
                            <div class="col-sm-3">
                                <input class="form-control" id="watermark_transparency" placeholder="" name="watermark_transparency"  value="<?php echo $or_data['watermark_transparency']; ?>"  type="text">
                            </div>
                            
                        </div>
                        
                         <div class="form-group">
                            <label for="watermark_position" class="col-sm-2 control-label no-padding-right"><?php echo \think\Lang::get('watermark_position'); ?></label>
                            <div class="col-sm-6">
                                <div class="control-group">
                                                <div class="radio col-sm-4">
                                                    <label>
                                                        <input name="watermark_position" type="radio" value="1" <?php if($or_data['watermark_position'] == 1): ?> checked="checked" <?php endif; ?> class="colored-blue">
                                                        <span class="text"> <?php echo \think\Lang::get('left_up'); ?></span>
                                                    </label>
                                                </div>

                                                <div class="radio col-sm-4">
                                                    <label>
                                                        <input name="watermark_position" type="radio" value="2"  <?php if($or_data['watermark_position'] == 2): ?> checked="checked" <?php endif; ?> class="colored-danger">
                                                        <span class="text"> <?php echo \think\Lang::get('center_up'); ?></span>
                                                    </label>
                                                </div>

                                                <div class="radio col-sm-4">
                                                    <label>
                                                        <input name="watermark_position" type="radio" value="3" <?php if($or_data['watermark_position'] == 3): ?> checked="checked" <?php endif; ?> class="colored-success">
                                                        <span class="text"> <?php echo \think\Lang::get('right_up'); ?></span>
                                                    </label>
                                                </div>

                                                <div class="radio col-sm-4">
                                                    <label>
                                                        <input name="watermark_position" type="radio" value="4" <?php if($or_data['watermark_position'] == 4): ?> checked="checked" <?php endif; ?> class="colored-blue">
                                                        <span class="text"> <?php echo \think\Lang::get('left_center'); ?></span>
                                                    </label>
                                                </div>
                                                <div class="radio col-sm-4">
                                                    <label>
                                                        <input name="watermark_position" type="radio" value="5" <?php if($or_data['watermark_position'] == 5): ?> checked="checked" <?php endif; ?> class="colored-danger">
                                                        <span class="text"> <?php echo \think\Lang::get('center'); ?></span>
                                                    </label>
                                                </div>
                                                <div class="radio col-sm-4">
                                                    <label>
                                                        <input name="watermark_position" type="radio" value="6" <?php if($or_data['watermark_position'] == 6): ?> checked="checked" <?php endif; ?> class="colored-success">
                                                        <span class="text"> <?php echo \think\Lang::get('right_center'); ?></span>
                                                    </label>
                                                </div>
                                                <div class="radio col-sm-4">
                                                    <label>
                                                        <input name="watermark_position" type="radio"  value="7" <?php if($or_data['watermark_position'] == 7): ?> checked="checked" <?php endif; ?> class="colored-blue">
                                                        <span class="text"> <?php echo \think\Lang::get('bottom_left'); ?></span>
                                                    </label>
                                                </div>
                                                <div class="radio col-sm-4">
                                                    <label>
                                                        <input name="watermark_position" type="radio" value="8" <?php if($or_data['watermark_position'] == 8): ?> checked="checked" <?php endif; ?> class="colored-danger">
                                                        <span class="text"> <?php echo \think\Lang::get('bottom_center'); ?></span>
                                                    </label>
                                                </div>
                                                <div class="radio col-sm-4">
                                                    <label>
                                                        <input name="watermark_position" type="radio" value="9" <?php if($or_data['watermark_position'] == 9): ?> checked="checked" <?php endif; ?>  class="colored-success">
                                                        <span class="text"> <?php echo \think\Lang::get('bottom_right'); ?></span>
                                                    </label>
                                                </div>
                                            </div>
                            </div>

                        </div>
                        
                       

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default"><?php echo \think\Lang::get('save_info'); ?></button>
                            </div>
                        </div>
                        
                    </form>
                    
				
                </div>
                

               
                <!-- /Page Body -->
            </div>
            <!-- /Page Content -->
		</div>	
	</div>

	    <!--Basic Scripts-->
    <script src="__JS__/jquery_002.js"></script>
    <script src="__JS__/bootstrap.js"></script>
    <script src="__JS__/jquery.js"></script>
    <!--Beyond Scripts-->
    <script src="__JS__/beyond.js"></script>
    


</body></html>