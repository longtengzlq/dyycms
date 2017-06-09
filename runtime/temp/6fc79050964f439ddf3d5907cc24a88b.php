<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:63:"C:\myweb\TP\public/../application/index\view\index\artlist.html";i:1496908113;s:44:"../application/index/view/common/header.html";i:1496917587;s:63:"C:\myweb\TP\public/../application/index\view\common\footer.html";i:1496908060;}*/ ?>
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

        <link rel="stylesheet" href="__CSS__/votestyles.css" type="text/css" />
        <link rel="stylesheet" href="__CSS__/voteitup.css" type="text/css" />
        <link rel="stylesheet" href="__CSS__/list.css" type="text/css" />
    </head>
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

        </div>
        <div id="wrapper">


            <div id="xh_container">
                <div id="xh_content">

                    <div class="path"><a href='/'>主页</a> >
                        <?php if(is_array($position) || $position instanceof \think\Collection || $position instanceof \think\Paginator): $i = 0; $__LIST__ = $position;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?>
                        <a href="<?php echo url('artlst',array('id'=>$cate['id'],'type'=>2)); ?>"><?php echo $cate['cate_name']; ?></a> >
                        <?php endforeach; endif; else: echo "" ;endif; ?>

                    </div><div class="clear"></div>
                    <div class="xh_area_h_3" style="margin-top: 40px;">
                        <?php if(is_array($articles) || $articles instanceof \think\Collection || $articles instanceof \think\Paginator): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): $mod = ($i % 2 );++$i;?>
                        <div class="xh_post_h_3 ofh">
                            <div class="xh">
                                <a target="_blank" href="<?php echo url('article',array('id'=>$article['id'],'type'=>1)); ?>" title="<?php echo $article['title']; ?>">
                                    <img src="<?php echo $article['thumb']; ?>" alt="<?php echo $article['title']; ?>" height="240" width="400"></a></div>
                            <div class="r ofh">
                                <h2 class="xh_post_h_3_title ofh" style="height:60px;">
                                    <a target="_blank" href="<?php echo url('article',array('id'=>$article['id'],'type'=>1)); ?>" title="<?php echo $article['title']; ?>"><?php echo $article['title']; ?></a>
                                </h2>
                                <span class="time"><?php echo $article['release_date']; ?></span>
                                <div class="xh_post_h_3_entry ofh" style="color:#555;height:80px; overflow:hidden;">
                                    <?php echo $article['description']; ?>

                                </div>
                                <div class="b">
                                    <a href="<?php echo url('article',array('id'=>$article['id'],'type'=>1)); ?>" class="xh_readmore" rel="nofollow">read
                                        more</a> <span title="<?php echo $article['zan']; ?>人赞" class="xh_love"><span class="textcontainer"><span>0</span></span> </span> <span title="<?php echo $article['clicks']; ?>人浏览" class="xh_views">
                                        88</span>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; endif; else: echo "" ;endif; ?>    

                        <?php echo $articles->render(); ?>

                    </div>
                </div>
                <div id="xh_sidebar">        
                    <!-- 右侧 -->

                    <div class="widget">

                        <div style="background: url('__IMG__/hots_bg.png') no-repeat scroll 0 0 transparent;width:250px;height:52px;margin-bottom:15px;">
                        </div>
                        <ul id="ulHot">
                            <?php if(is_array($hot_arts) || $hot_arts instanceof \think\Collection || $hot_arts instanceof \think\Paginator): $i = 0; $__LIST__ = $hot_arts;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hot): $mod = ($i % 2 );++$i;?>
                            <li style="border-bottom:dashed 1px #ccc;height:70px; margin-bottom:15px;">
                                <div style="float:left;width:85px;height:55px; overflow:hidden;"><a href="<?php echo url('article',array('id'=>$hot['id'],'type'=>1)); ?>" target="_blank"><img src="<?php echo $hot['thumb']; ?>" width="83" title="<?php echo $hot['title']; ?>" /></a></div>
                                <div style="float:right;width:145px;height:52px; overflow:hidden;"><a href="<?php echo url('article',array('id'=>$hot['id'],'type'=>1)); ?>" target="_blank" title="<?php echo $hot['title']; ?>"><?php echo $hot['title']; ?></a></div>
                            </li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>

                        </ul>
                    </div>

                    <div class="widget portrait">
                        <div>
                            <div class="textwidget">
                                <a href="/tougao.html"><img src="__IMG__/tg.jpg" alt="鎶曠ǹ"></a><br><br>          
                                        <script type="text/javascript">BAIDU_CLB_fillSlot("870073");</script>
                                        <script type="text/javascript">BAIDU_CLB_fillSlot("870080");</script>
                                        <script type="text/javascript">BAIDU_CLB_fillSlot("870081");</script>
                                        </div>
                                        </div>
                                        </div>

                                        </div>
                                        <div class="clear">
                                        </div>
                                        </div>
                                        <div class="boxBor"></div>

                                        <div class="boxBor" onclick="IBoxBor()" style="cursor:pointer;"></div>
                                        <script type="text/javascript">
                                            $(function () {
                                                var imgHoverSetTimeOut = null;
                                                $('.xh_265x265 img').hover(function () {
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
                                                    imgHoverSetTimeOut = setTimeout(function () {
                                                        $(".boxBor").hide();
                                                    }, 500);
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

                                        </div>

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
