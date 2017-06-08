<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:63:"C:\myweb\TP\public/../application/admin\view\category\list.html";i:1496830586;s:63:"C:\myweb\TP\public/../application/admin\view\common\header.html";i:1496919045;s:61:"C:\myweb\TP\public/../application/admin\view\common\left.html";i:1496908348;}*/ ?>
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
                                        <li>
                        <a href="<?php echo url('index/index'); ?>"><?php echo \think\Lang::get('system'); ?></a>
                    </li>
                                        <li class="active"><?php echo \think\Lang::get('category_list'); ?></li>
                                        </ul>
                </div>
                <!-- /Page Breadcrumb -->

                <!-- Page Body -->
                <div class="page-body">
                    
<button type="button" tooltip="<?php echo \think\Lang::get('add'); ?>" class="btn btn-sm btn-azure btn-addon" onClick="javascript:window.location.href = '<?php echo url('category/add',array('language_id'=>intval($language_id))); ?>'"> <i class="fa fa-plus"></i> <?php echo \think\Lang::get('add'); ?>
</button>
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-body">
                <div class="flip-scroll">
                    <form id="myform" action="" method="post">
                            
                    <table class="table table-bordered table-hover ">
                        <thead class="">
                            <tr>
                                <th class="text-center" style="vertical-align: middle;;font-size: 13px">
                                    <label >
                                            <input type="checkbox" class="colored-success"   id='check_all'>
                                            <span id="check-2" class="text"></span>
                                         </label>

                                </th>
                                <th class="text-center" style="vertical-align: middle"><?php echo \think\Lang::get('id'); ?></th>
                                <th class="text-center" style="vertical-align: middle"><a href="" style='color:inherit'><?php echo \think\Lang::get('sort'); ?></a></th>                                
                                <th class="text-center" style="vertical-align: middle"><?php echo \think\Lang::get('category_name'); ?></th>
                                <th class="text-center" style="vertical-align: middle"><?php echo \think\Lang::get('category_status'); ?></th>
                                <th class="text-center" style="vertical-align: middle"><?php echo \think\Lang::get('category_recommond'); ?></th>
                                <th class="text-center" style="vertical-align: middle"><?php echo \think\Lang::get('category_lang'); ?></th>                               
                                <th class="text-center" style="vertical-align: middle"><?php echo \think\Lang::get('model'); ?></th>                               
                                <th class="text-center" style="vertical-align: middle"><?php echo \think\Lang::get('operation'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php if(is_array($sort_cates) || $sort_cates instanceof \think\Collection || $sort_cates instanceof \think\Paginator): $i = 0; $__LIST__ = $sort_cates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <tr>
                                <td align="center" style='vertical-align: middle;'>
                                         <label >
                                                    <input name="checkbox[]" dataid="id-<?php echo $vo['dataid']; ?>"  type="checkbox"  class="colored-success  checkbox-parent <?php if($vo['level'] != 0): ?> checkbox-child <?php endif; ?> " data-tog='ss'  value='<?php echo $vo['id']; ?>'>
                                                    <span id="check-2 " class="text"></span>
                                                </label> 
                                </td>
                                <td align="center" style='vertical-align: middle;;font-size: 13px'><?php echo $vo['id']; ?></td>
                                <td align="center"  class="col-sm-1" style='vertical-align: middle;font-size: 13px'>
                                    <input type="text" class="form-control col-sm-2 text-center" name='sort[<?php echo $vo['id']; ?>]'  value=" <?php echo $vo['sort']; ?>"  placeholder="Default Input">
                                  </td>
                                
                                <td align="center"  style='vertical-align: middle;font-size: 13px;text-align: left'>
                                    
                                        <?php if($vo['level']>0) { echo str_repeat('&nbsp;&nbsp;&nbsp; |&nbsp;&nbsp;&nbsp;',$vo['level']-1).'&nbsp;&nbsp;&nbsp; |---';}?><?php echo $vo['cate_name']; ?>
                                    
                                </td>
                                <td align="center"  style='vertical-align: middle;font-size: 13px'>
                                    <label >
                                         <input class="checkbox-slider colored-success " style="left: inherit" id='status_<?php echo $vo['id']; ?>'   onclick="set_status(<?php echo $vo['id']; ?>,this)"   name='status' <?php if($vo['status'] == 1): ?> checked="checked" <?php endif; ?>type="checkbox">
                                        <span class="text" style="margin-bottom: -13px"></span>
                                    </label>
                                </td>
                                 <td align="center"  style='vertical-align: middle;font-size: 13px'>
                                    <label >
                                         <input class="checkbox-slider colored-success " style="left: inherit" id='recommond_<?php echo $vo['id']; ?>'   onclick="set_status(<?php echo $vo['id']; ?>,this)"   name='is_recommond' <?php if($vo['is_recommond'] == 1): ?> checked="checked" <?php endif; ?>type="checkbox">
                                        <span class="text" style="margin-bottom: -13px"></span>
                                    </label>
                                </td>
                                 <td align="center"  style='vertical-align: middle;font-size: 13px'><?php if($vo['language']['id'] == 1): ?><?php echo \think\Lang::get('CH'); else: ?><?php echo \think\Lang::get('EN'); endif; ?></td>
                                 <td align="center"  style='vertical-align: middle;font-size: 13px'><?php if($lang_type == 'zh-cn'): ?><?php echo $vo['modelType']['model_ch_name']; else: ?><?php echo $vo['modelType']['model_en_name']; endif; ?></td>
                                
                                <td align="center" class="buttons-preview"  style='vertical-align: middle;font-size: 13px'>
                                    <a href="<?php echo url('category/edit',array('id'=>$vo['id'],'language_id'=>$vo['language_id'])); ?>" class="btn btn-azure btn-m " style="margin-bottom: -1px;">
                                        <i class="fa fa-edit"></i> <?php echo \think\Lang::get('edit'); ?>
                                    </a>
                            
                                    <a href="#" onClick="warning('<?php echo \think\Lang::get('delete_confirm'); ?>', '<?php echo url('category/del',array('id'=>$vo['id'],'language_id'=>$vo['language_id'])); ?>')" class="btn btn-darkorange  btn-m" style="margin-bottom: -1px;">
                                        <i class="fa fa-trash-o"></i> <?php echo \think\Lang::get('delete'); ?>
                                    </a>
                                </td>
                            </tr>
                             <?php endforeach; endif; else: echo "" ;endif; ?>   
                        </tbody>
                  
                    </table>
                       
                    </form>
                </div>
                <div  style="display: block">
                <div style="padding-top: 5px; display: inline-block ;">                           
              <!--      <a  onclick='(function(){$("form").attr("action","<?php echo url("delMuti",array("language_id"=>"1")); ?>");;$("#myform").submit();})();' class="btn btn-darkorange">删除</a>
                  -->
                  <a  onclick='del_arr()' class="btn btn-darkorange"><?php echo \think\Lang::get('delete'); ?></a>
                  <a onclick="sort_arr()" class="btn btn-azure"><?php echo \think\Lang::get('sort'); ?></a>
                             
                </div>
                <div style="padding-top: 5px;display: inline-block ; float: right; ">
                    
                </div>
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
<script src="__JS__/jquery_002.js"></script>
	    <!--Basic Scripts-->
 <script src="__JS__/bootstrap.js"></script>
   
    <!--Beyond Scripts-->
    <script src="__JS__/beyond.js"></script>
    <script>
        $("#check_all").click(function(){           
         $(':input:checkbox[data-tog="ss"]').prop('checked',this.checked);             
        });
        
        function del_arr(){
            if($(":input:checkbox:checked").length>0){               
                $("form").attr("action","<?php echo url('delMuti',array('language_id'=>$language_id)); ?>");
                $("#myform").submit();
            }else{
                alert('<?php echo \think\Lang::get('no_selected_checkbox'); ?>');
            }
        }
        function sort_arr(){            
                $("form").attr("action","<?php echo url('resort',array('language_id'=>$language_id)); ?>");
                $("#myform").submit();
        }
         function set_status(id,obj){            
            var status=false;
            if($('#'+obj.id).attr('checked')=='checked'){
                status=true;
            }          
            if(status){
                $('#'+obj.id).removeAttr('checked');                 
               set_remote_status(id,obj.name,0);
            }else{
                $('#'+obj.id).attr('checked','checked');
                set_remote_status(id,obj.name,1);
            }
            
        }
        function set_remote_status(id,field_name,field_value){  
            
            $.ajax({
                url:"<?php echo url('updateStatus'); ?>",
                data:{'id':id,'field_name':field_name,'field_value':field_value},
                success:function(msg){
                },
                error:function (XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                },
            });
            
        }
        $(function () {
    //动态选择框，上下级选中状态变化
    $('input.checkbox-parent').on('change', function () {
        var dataid = $(this).attr("dataid");
        $('input[dataid^=' + dataid + ']').prop('checked', $(this).is(':checked'));
    });
    $('input.checkbox-child').on('change', function () {
        var dataid = $(this).attr("dataid");
        dataid = dataid.substring(0, dataid.lastIndexOf("-"));
        var parent = $('input[dataid=' + dataid + ']');
        if ($(this).is(':checked')) {
            parent.prop('checked', true);
            //循环到顶级
            while (dataid.lastIndexOf("-") != 2) {
                dataid = dataid.substring(0, dataid.lastIndexOf("-"));
                parent = $('input[dataid=' + dataid + ']');
                parent.prop('checked', true);
            }
        } else {
            //父级
            if ($('input[dataid^=' + dataid + '-]:checked').length == 0) {
                parent.prop('checked', false);
                //循环到顶级
                while (dataid.lastIndexOf("-") != 2) {
                    dataid = dataid.substring(0, dataid.lastIndexOf("-"));
                    parent = $('input[dataid=' + dataid + ']');
                    if ($('input[dataid^=' + dataid + '-]:checked').length == 0) {
                        parent.prop('checked', false);
                    }
                }
            }
        }
    });
});
    </script>


</body></html>