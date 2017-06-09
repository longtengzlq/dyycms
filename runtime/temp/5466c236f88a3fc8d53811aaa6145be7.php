<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:62:"C:\myweb\TP\public/../application/index\view\index\imglst.html";i:1496908123;s:44:"../application/index/view/common/header.html";i:1496917587;s:63:"C:\myweb\TP\public/../application/index\view\common\footer.html";i:1496908060;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $system['site_name']; ?></title>
        <meta name="description" content="<?php echo $system['site_description']; ?>" />
        <meta name="keywords" content="<?php echo $system['site_keywords']; ?>" />

<link rel="stylesheet" type="text/css" media="all" href="__CSS__/style.css" />
    <script src="__JS__/jquery-1.4.1.min.js" type="text/javascript"></script>
    <script src="__JS__/jquery.error.js" type="text/javascript"></script>
    <script src="__JS__/jtemplates.js" type="text/javascript"></script>
    <script src="__JS__/jquery.form.js" type="text/javascript"></script>
    <script src="__JS__/lazy.js" type="text/javascript"></script>
    <script type="text/javascript" src="__JS__/wp-sns-share.js"></script>
    <script type="text/javascript" src="__JS__/voterajax.js"></script>
    <script type="text/javascript" src="__JS__/userregister.js"></script>

    <link rel="stylesheet" href="__CSS__/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="__CSS__/votestyles.css" type="text/css" />
    <link rel="stylesheet" href="__CSS__/voteitup.css" type="text/css" />
    <link rel="stylesheet" href="__CSS__/list.css" type="text/css" />
</head>
       <style type="text/css">
        body
        {
            background-image: none;
            background-color: #dedede;
            color: #999999;
            font-family: "Microsoft Yahei" , "Helvetica Neue" ,Arial,Helvetica,sans-serif;
            font-size: 12px;
            height: 100%;
            text-align: left;
            width: 100%;
        }
        #position{
            float:left;
        }
        #xh_container
        {
            min-height: 1000px;
            background-color: #dedede;
            margin-top: 36px;
            width: 1098px;
        }
        #wrapper
        {
            background-color: #dedede;
        }
        #l-nav
        {
            background-image: url('/blog4./style/simg/look-bike-nav-bg.png');
            width: 188px;
            height: 360px;
            float: left;
        }
        #l-nav a
        {
            font-size: 14px;
            color: #000000;
        }
        #l-nav a:hover
        {
            font-size: 14px;
            color: #999999;
        }
        #l-nav div
        {
            padding-left: 20px;
        }
        #l-nav .l-nav-word
        {
            height: 40px;
            line-height: 40px;
        }
        #l-focus
        {
            float: right;
        }
        img
        {
            vertical-align: middle;
        }
        
        div
        {
            color: #666666;
        }
        #menu-item-196 a.a,#menu-item-198 a.a,#menu-item-197 a.a{color: #00BBEE;}
        #menu-item-198{ background-image:url('__IMG__/up-arrow.png'); background-position: center bottom; background-repeat:no-repeat;} 
        .boxBor{
    position:absolute;left:0;top:0;display:none;z-index:9999; background-color:#ffffff;opacity: 0.3;filter:alpha(opacity=30)
}

    </style>
<body id="list_style_2" class="list_style_2">
   <script>
 function subForm()
 {

 formsearch.submit();
 //form1为form的id
 }
 </script>
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
                        <a href="/" title="MLCMS">MLCMS-HZ5A出品</a>
                        <div class="" id="logo-sub-class">
                        </div>
                    </h1>
                </div>
                <div id="navi">

                    <ul id="jsddm">
                        <li><a class="navi_home" href="/">首页</a></li>

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
         <a style="color: white;padding: 0 5px" href="/?lang=zh-cn">简体中文</a>
         <a style="color: white;padding: 0 5px" href="/?lang=en-us">English</a>
     </div>
        </div>
<div style="padding: ">   </div>

<div id="position" style='display: block;text-align: left;' >

                    <div class="path" style='display: block;text-align: left; margin-left: -700px;'><a href='/'>主页</a> >
                        <?php if(is_array($position) || $position instanceof \think\Collection || $position instanceof \think\Paginator): $i = 0; $__LIST__ = $position;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?>
                        <a href="<?php echo url('artlst',array('id'=>$cate['id'],'type'=>2)); ?>"><?php echo $cate['cate_name']; ?></a> >
                        <?php endforeach; endif; else: echo "" ;endif; ?>

                    </div>
                    </div>
    <div id="wrapper">
           

               
 
    <div id="xh_container">

        
<div class="xh_265x265x00">
    <?php if(is_array($articles) || $articles instanceof \think\Collection || $articles instanceof \think\Paginator): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): $mod = ($i % 2 );++$i;?>
    <div style="float: left; width: 343px; height: 293px; background-color: #ffffff;
                border: solid 1px #ccc; margin-left: 15px;margin-top: 15px;">
                <div style="background-color: #cccccc; width: 313px; height: 188px; margin-top: 16px;
                    margin-left: 14px;">
                    <a target="_blank" href="<?php echo url('article',array('id'=>$article['id'],'type'=>'1')); ?>"><img src="<?php echo $article['thumb']; ?>" alt="<?php echo $article['title']; ?>" height="188" width="313"></a>
                </div>
                <div style="margin-left: 14px; line-height: 25px; margin-top: 10px;">
                    <div style="font-size: 12px;color:#cccccc;"><?php echo $article['release_date']; ?></div>
                    <div style="font-size: 14px;height:45px;">
                        <a style='color:black' target="_blank" href="<?php echo url('article',array('id'=>$article['id'],'type'=>2)); ?>"><?php echo $article['title']; ?></a></div>
                    
                </div>
            </div>
 <?php endforeach; endif; else: echo "" ;endif; ?>
           
        
    <div style="clear: both;">
    </div>
                <div id="pagination"><div class="wp-pagenavi">
               <?php echo $articles->render(); ?>
                </div></div>    
</div>

        


    </div>
    <script type="text/javascript">
        $("#menu-item-198").find("a").addClass("a");
        $(".i-prev").hover(function () { $(this).addClass("i-prev-o"); }, function () { $(this).removeClass("i-prev-o"); });
        $(".i-next").hover(function () { $(this).addClass("i-next-o"); }, function () { $(this).removeClass("i-next-o"); });
        $(".more0").hover(function () { $(this).attr("src", "__CSS__/simg/more-o.png"); }, function () { $(this).attr("src", "./style/simg/more.png"); });
    </script>
    <div class="boxBor"></div>
    
    <input type="hidden" id="hdBoxbor" />
    <div class="boxBor" onclick="IBoxBor()" style="cursor:pointer;"></div>


    </div>
<script type="text/javascript">
        $(function () {
            var imgHoverSetTimeOut = null;
            $('.xh_265x265x00 img').hover(function () {
                var oPosition = $(this).offset();
                var oThis = $(this);
                $(".boxBor").css({
                    left: oPosition.left,
                    top: oPosition.top,
                    width: oThis.width(),
                    height: oThis.height()
                });
                $(".boxBor").show();
                var urlText = $(this).parent().attr("href");
                $("#hdBoxbor").val(urlText);
            }, function () {
                imgHoverSetTimeOut = setTimeout(function () { $(".boxBor").hide(); }, 500);
            });
            $(".boxBor").hover(
                function () {
                    clearTimeout(imgHoverSetTimeOut);
                }
                , function () {
                    $(".boxBor").hide();
                }
            );
        });
        function IBoxBor() {
            window.open($("#hdBoxbor").val());
        }
        function goanewurl() {
            window.open($("#hdUrlFocus").val());
        }
</script>

   
                                         <div id="footer_wrap">
                                            <div id="footer">
                                                <!--
                                                <div class="footer_navi">
                                                    <ul id="menu-%e5%b0%be%e9%83%a8%e5%af%bc%e8%88%aa" class="menu">
                                                        <li id="menu-item-156" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-156">
                                                            <a href="/aboutus.html">关于我们</a></li>
                                                        <li id="menu-item-157" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-157">
                                                            <a href="/news/">行业资讯</a></li>
                                                        <li id="menu-item-158" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-158">
                                                            <a href="/tougao.html">我要投稿</a></li>
                                                    </ul>
                                                </div>
                                                -->
                                                <div class="footer_info">
                                                    <span class="legal"><?php echo $system['site_copyright']; ?>

                                                </div>
                                            </div>
                                        </div>
<div style="display: none;" id="scroll">
</div>
<script type="text/javascript" src="__JS__/z700bike_global.js"></script>

</body>
</html>
