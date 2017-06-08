<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:62:"C:\myweb\TP\public/../application/admin\view\article\edit.html";i:1496821192;s:63:"C:\myweb\TP\public/../application/admin\view\common\header.html";i:1496919045;s:61:"C:\myweb\TP\public/../application/admin\view\common\left.html";i:1496908348;}*/ ?>
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
	<!-- /头部 -->
	
	<div class="main-container container-fluid">
		<div class="page-container">
		 <!-- Page Sidebar -->
            
                <!-- Page Sidebar Header-->
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
                        <li>
                            <a href="<?php echo url('index/index',''); ?>"><?php echo \think\Lang::get('system'); ?></a>
                        </li>
                        <li>
                            <a href="<?php echo url('article/lst',''); ?>"><?php echo \think\Lang::get('article'); ?></a>
                        </li>
                        <li class="active"><?php echo \think\Lang::get('edit'); ?>
                        </li>
                    </ul>
                </div>
                <!-- /Page Breadcrumb -->

                <!-- Page Body -->
                <div class="page-body">
                    
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-blue">
                <span class="widget-caption"><?php echo \think\Lang::get('edit'); ?></span>
            </div>
            <div class="widget-body">
                <div id="horizontal-form">
                    <form class="form-horizontal" role="form" action="<?php echo url('article/edit'); ?> " enctype="multipart/form-data"   method="post">
                        <input name="id" required=""  type="hidden" value="<?php echo $results['id']; ?>" class="form-control">
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label no-padding-right"><?php echo \think\Lang::get('title'); ?></label>
                            <div class="col-sm-6">
                                <span class="input-icon icon-right inverted">
                                    <input name="title" required=""  type="text" value="<?php echo $results['title']; ?>" class="form-control">
                                    <i class="fa fa-paper-plane bg-danger"></i>
                                </span>
                                <!--<input class="form-control" id="username" placeholder="" name="username" required="" type="text">-->
                            </div>
                            <p class="help-block col-sm-4 red">* <?php echo \think\Lang::get('required'); ?></p>
                        </div>
                        <div class="form-group">
                            <label for="author" class="col-sm-2 control-label no-padding-right"><?php echo \think\Lang::get('author'); ?></label>
                            <div class="col-sm-6">
                               
                                <span class="input-icon icon-right inverted">
                                    <input name="author"  type="text"  value="<?php echo $results['author']; ?>" class="form-control">
                                    <i class="fa fa-user bg-darkorange"></i>
                                </span>
                                <!--<input class="form-control" id="username" placeholder="" name="username" required="" type="text">-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category_id" class="col-sm-2 control-label no-padding-right"><?php echo \think\Lang::get('category_name'); ?></label>
                            <div class="col-sm-6">  

                                <select class="form-control" id="authority" name="category_id" value="<?php echo $results['title']; ?>"  style="border-radius:0px;">
                                    <option value="0" >Top Category</option>
                                    <?php if(is_array($sort_cates) || $sort_cates instanceof \think\Collection || $sort_cates instanceof \think\Paginator): $i = 0; $__LIST__ = $sort_cates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?>
                                        <option value="<?php echo $cate['id']; ?>"  <?php if($results['category_id'] == $cate['id']): ?>selected="selected"<?php endif; ?>> <?php if($cate['level']>0) { echo str_repeat('|&nbsp;&nbsp;&nbsp; &nbsp;',$cate['level']-1).'|---';}?><?php echo $cate['cate_name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div> 
                        
                        <div class="form-group">
                            <label for="key_words" class="col-sm-2 control-label no-padding-right"><?php echo \think\Lang::get('key_word'); ?></label>
                            <div class="col-sm-6">
                                <span class="input-icon icon-right inverted">
                                    <input name="key_words" name='key_words' value="<?php echo $results['key_words']; ?>"   type="text" class="form-control">
                                    <i class="fa fa-file-word-o bg-orange"></i>
                                </span>
                                <!--<input class="form-control" id="username" placeholder="" name="username" required="" type="text">-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label no-padding-right"><?php echo \think\Lang::get('description'); ?></label>
                            <div class="col-sm-6">
                                <textarea name="description" rows="3" placeholder="<?php echo $results['description']; ?>"  class="form-control"><?php echo $results['description']; ?></textarea>                                
                            </div>
                        </div>
                         <div class="form-group">                            
                            <label for="language_id" class="col-sm-2 control-label no-padding-right"><?php echo \think\Lang::get('category_lang'); ?></label>
                            <div class="col-sm-6">  
                                <span class="input-icon icon-right inverted">

                                    <input name="language_name"  type="text" disabled="disabled"  value="&nbsp;&nbsp;<?php echo $lang[intval($language_id)]['brief_name']; ?> "   class="form-control">
                                    <i class="fa fa-language  btn-maroon"></i>
                                </span>
                                <input name="language_id" type="hidden"   value="<?php echo $language_id; ?> ">  
                            </div>
                        </div>   
                        <div class="form-group">
                            <label for="thumb" class="col-sm-2 control-label no-padding-right"><?php echo \think\Lang::get('thumb'); ?></label>
                            <div class="col-sm-4">
                                 <input id="thumb" placeholder="建议上传缩略图"  name="thumb"  value="<?php echo $results['thumb']; ?>"  type="file"  style="margin-top: 5px;display: inline-block;">
                                    <img src="<?php echo $results['thumb']; ?>" alt="" style="padding: 0px; height: 40px; display: inline-block" class="comment-avatar">
                                <!--<input class="form-control" id="username" placeholder="" name="username" required="" type="text">-->
                            </div>
                            
                        </div>
                       
                         
                       
                        <div class="form-group">
                            <label for="content" class="col-sm-2 control-label no-padding-right"><?php echo \think\Lang::get('content'); ?></label>
                            <div class="col-sm-7" id='content' name='content'   >
                            </div>
                            
                        </div>
                        
                        <div class="form-group">
                            <label for="status" class="col-sm-2 control-label no-padding-right" ><?php echo \think\Lang::get('art_status'); ?></label>
                            <div class="col-sm-6">
                                <label>
                                    <input class="checkbox-slider colored-success "  id='status' <?php if($results['status'] == 1): ?>checked="checked"<?php endif; ?>  name='status' type="checkbox">
                                    <span class="text" style="margin-top:5px"></span>
                                </label>
                            </div>                             
                        </div>
                       <div class="form-group">
                            <label for="release_date" class="col-sm-2 control-label no-padding-right"><?php echo \think\Lang::get('release_date'); ?></label>
                            <div class="col-sm-6">
                                
                                <span class="input-icon icon-right inverted">
                                    <input class="form-control date-picker" name="release_date" value="<?php echo date('Y-m-d',$results['release_date']); ?>"   data-date-format="yyyy-mm-dd"  type="text" >
                                    <i class="fa fa-calendar bg-success"></i>
                                </span>
                                <!--<input class="form-control" id="username" placeholder="" name="username" required="" type="text">-->
                            </div>
                        </div>
                          
                       <div class="form-group">
                           <label for="is_recommend" class="col-sm-2 control-label no-padding-right" ><?php echo \think\Lang::get('is_recommond'); ?></label>
                            <div class="col-sm-6">
                                <label>
                                    <input class="checkbox-slider colored-success "  id='is_recommend'  name='is_recommend'<?php if($results['is_recommend'] == 1): ?>checked="checked"<?php endif; ?>type="checkbox" type="checkbox">
                                    <span class="text" style="margin-top:5px"></span>
                                </label>
                            </div>                             
                        </div>
                        <div class="form-group">
                             <label for="can_comment" class="col-sm-2 control-label no-padding-right" ><?php echo \think\Lang::get('can_comment'); ?></label>
                            <div class="col-sm-6">
                                <label>
                                    <input class="checkbox-slider colored-success "  id='can_comment'  name='can_comment' <?php if($results['can_comment'] == 1): ?>checked="checked"<?php endif; ?>  type="checkbox">
                                    <span class="text" style="margin-top:5px"></span>
                                </label>
                            </div> 
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-blue"><?php echo \think\Lang::get('save_info'); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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

    <script src="__JS__/bootstrap-datepicker.js"></script>
        <!--UEditor Scripts-->
    <script src="__THIRD__/ueditor/ueditor.config.js"></script>
    <script src="__THIRD__/ueditor/ueditor.all.min.js"></script>
    <script src="__THIRD__/ueditor/lang/zh-cn/zh-cn.js"></script>
   <script src="__THIRD__/skins.min.js"></script>
   
    <script>
       $('.date-picker').datepicker();
    </script>

    <script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    
 var ue=UE.getEditor('content',{initialFrameWidth:null,initialFrameHeight:400,initialContent:'<?php echo $results["content"]?>'});
 

    </script>

</body></html>