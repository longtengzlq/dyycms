<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:89:"C:\myweb\TP\public/../application/en\view\..\..\..\public\template\detail_page_model.html";i:1496890936;s:60:"C:\myweb\TP\public/../application/en\view\common\header.html";i:1496890808;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>童老师ThinkPHP5交流群：484519446</title>
        <meta name="description" content="童老师ThinkPHP5交流群：484519446" />
        <meta name="keywords" content="童老师ThinkPHP5交流群：484519446" />
        <link rel="stylesheet" type="text/css" media="all" href="__CSS__/style.css" />
        <script src="__JS__/jquery-1.4.1.min.js" type="text/javascript"></script>
        <script src="__JS__/jquery.js" type="text/javascript"></script>
        <script src="__JS__/jquery.error.js" type="text/javascript"></script>
        <script src="__JS__/jtemplates.js" type="text/javascript"></script>
        <script src="__JS__/jquery.form.js" type="text/javascript"></script>
        <script src="__JS__/lazy.js" type="text/javascript"></script>
        <script type="text/javascript" src="__JS__/wp-sns-share.js"></script>
        <script type="text/javascript" src="__JS__/voterajax.js"></script>
        <script type="text/javascript" src="__JS__/userregister.js"></script>
        <link rel="stylesheet" href="__CSS__/pagenavi-css.css" type="text/css" media="all" />
        <link rel="stylesheet" href="__CSS__/votestyles.css" type="text/css" />
        <link rel="stylesheet" href="__CSS__/voteitup.css" type="text/css" />
        <style type="text/css">
            #wrapper
            {
                background-color: #ffffff;
            }
            .single_entry{margin-top:30px;}
        </style>
    </head>
    <body class="single2">

        <script type="text/javascript">
            function showMask() {
                $("#mask").css("height", $(document).height());
                $("#mask").css("width", $(document).width());
                $("#mask").show();
            }
        </script>
        <div id="mask" class="mask" onclick="CloseMask()"></div> 
         <div id="header_wrap">
            <div id="header">
                <div style="float: left; width: 310px;">
                    <h1>
                        <a href="/" title="宽屏大气文章类--41天鹰模板">宽屏大气文章类--41天鹰模板</a>
                        <div class="" id="logo-sub-class">
                        </div>
                    </h1>
                </div>
                <div id="navi">

                    <ul id="jsddm">
                        <li><a class="navi_home" href="/?lang=en-us">Home</a></li>

                        <?php if(is_array($sort_cates) || $sort_cates instanceof \think\Collection || $sort_cates instanceof \think\Paginator): $i = 0; $__LIST__ = $sort_cates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <li><a href="<?php if($vo['model_type_id'] == 8): ?><?php echo url('index/artlst',array('id'=>$vo['id'],'type'=>2)); elseif($vo['model_type_id'] == 1): ?><?php echo url('index/imglst',array('id'=>$vo['id'],'type'=>2)); else: ?><?php echo url('index/page',array('id'=>$vo['id'],'type'=>1)); endif; ?>"><?php echo $vo['cate_name']; ?></a>
                             <?php if($vo['children'] != 0): ?>
                            <ul>
                                <?php foreach($vo['children'] as $k=>$value){?>
                                <li><a href="<?php if($value['model_type_id'] == 8): ?><?php echo url('index/artlst',array('id'=>$value['id'],'type'=>2)); elseif($value['model_type_id'] == 1): ?><?php echo url('index/imglst',array('id'=>$value['id'],'type'=>2)); else: ?><?php echo url('index/page',array('id'=>$value['id'],'type'=>1)); endif; ?>"><?php echo $value['cate_name']; ?></a></li>                                  
                                <?php }?>
                            </ul>
                            <?php endif; ?> 

                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>

                    </ul>

                    <div style="clear: both;">
                    </div>


                </div>
                <div style="float: right; width: 209px;">
                    <div class="widget" style="height: 30px; padding-top: 20px;">
                        <div style="float: left;">
                            <form  name="formsearch" action="<?php echo url('index/search'); ?>"><input type="hidden" name="kwtype" value="0" />                
                                <input name="keyword" type="text" style="background-color: #000000;padding-left: 10px; font-size: 12px;font-family: 'Microsoft Yahei'; color: #999999;height: 29px; width: 160px; border: solid 1px #666666; line-height: 28px;" id="go" value="在这里搜索..." onfocus="if (this.value == '在这里搜索...') {
                                            this.value = '';
                                        }"  onblur="if (this.value == '') {
                                                    this.value = '在这里搜索...';
                                                }" />
                            </form>
                        </div>
                        <div style="float: left;">
                            <img src="__IMG__/search-new.png" id="imgSearch" style="cursor: pointer; margin: 0px;
                                 padding: 0px;" onclick="subForm()"  /></div>
                        <div style="clear: both;">
                        </div>
                    </div>
                </div>

            </div>
     <div style="float: right;color: white;position: absolute; right: 10px;top: 10px;padding: 15px 50px;">
         <a style="color: white;padding: 0 5px" href="?lang=zh-cn">简体中文</a>
         <a style="color: white;padding: 0 5px" href="?lang=en-us">English</a>
     </div>
    
        </div>
        <div id="wrapper">

            <div class="single_entry page_entry">
                <div class="entry">
                    <h2 style="margin: 0px 0px 20px; padding: 0px; border: 0px; font-size: 22px; vertical-align: baseline; font-family: 'Microsoft Yahei', 'Trebuchet MS', Arial, Tahoma, Helvetica, sans-serif; line-height: 26px; color: rgb(51, 51, 51);">
                       <?php echo $cate['cate_name']; ?></h2>
                   <?php echo $cate['content']; ?>
                    <div class="clear">
                    </div>
                </div>
            </div>

        </div>
        <div id="footer_wrap">
            <div id="footer">
                <div class="footer_navi">
                    <ul id="menu-%e5%b0%be%e9%83%a8%e5%af%bc%e8%88%aa" class="menu">
                        <li id="menu-item-156" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-156">
                            <a href="/aboutus.html">关于我们</a></li>
                        <li id="menu-item-157" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-157">
                            <a href="/contact.html">联络我们</a></li>
                        <li id="menu-item-158" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-158">
                            <a href="/tougao.html">我要投稿</a></li>
                    </ul>
                </div>
                <div class="footer_info">
                    <span class="legal">Copyright &copy; 2002-2014 ThinkPHP5 版权所有&nbsp;&nbsp;&nbsp;<a href="#">
                            粤ICP备******号</a>&nbsp;&nbsp;&nbsp;
                </div>
            </div>
        </div>
        <div style="display: none;" id="scroll">
        </div>
        <script type="text/javascript" src="__JS__/z700bike_global.js"></script>
    </body>
</html>
