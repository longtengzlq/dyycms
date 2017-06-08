<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:58:"C:\myweb\TP\public/../application/en\view\index\index.html";i:1496908037;s:60:"C:\myweb\TP\public/../application/en\view\common\header.html";i:1496890808;s:60:"C:\myweb\TP\public/../application/en\view\common\footer.html";i:1496907866;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
        <title><?php echo $system['site_name']; ?></title>
        <meta name="description" content="<?php echo $system['site_description']; ?>" />
        <meta name="keywords" content="<?php echo $system['site_keywords']; ?>" />


        <link rel="stylesheet" type="text/css" media="all" href="__CSS__/style.css" />
        <script type="text/javascript" src="__JS__/jquery-1.4.1.min.js"></script>
        <script type="text/javascript" src="__JS__/jquery.js"></script>
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
            
        <script type="text/javascript">
            function IFocuse(th, o) {
                var t = $(th);
                var c = t.attr("class");
                if (o) {
                    t.removeClass(c).addClass(c + "-over");
                } else {
                    t.removeClass(c).addClass(c.replace("-over", ""));
                }
            }
        </script>
    </head>
    <body class="xh_body">
        <script src="__JS__/common.js" type="text/javascript"></script>
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
        <div id="xh_wrapper">

            <input type="hidden" id="hdUrlFocus" />
            <div class="xh_h_show">
                <div class="xh_h_show_in">
                    <div id="zSlider">
                        <div id="picshow">
                            <div id="picshow_img">
                                <ul>
                                    <?php if(is_array($rec_arts) || $rec_arts instanceof \think\Collection || $rec_arts instanceof \think\Paginator): $i = 0; $__LIST__ = $rec_arts;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rec_art): $mod = ($i % 2 );++$i;?>
                                    <li style="display: list-item;"><a href="<?php echo url('article',array('id'=>$rec_art['id'])); ?>" target="_blank">
                                            <img src="<?php echo $rec_art['thumb']; ?>" alt="<?php echo $rec_art['title']; ?>"></a></li>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                            </div>
                        </div>
                        <div id="select_btn">
                            <ul>
                                <li class="current"></li><li class=""></li><li class=""></li><li class=""></li>
                            </ul>
                        </div>
                        <div class="focus-bg-title"><div id="focus-left" class="arrow-left" onmouseover="IFocuse(this, true)" onmouseout="IFocuse(this, false)"></div>
                            <div id="focus-center" class="focus-title">
                                <div style="float:left;width:580px;padding-left:10px;font-size:18px;" id="focus-tl-s"></div>
                                <div style="float:right;width:200px;"></div>
                            </div>
                            <div id="focus-right" class="arrow-right"></div></div>
                    </div>
                    <div id="picshow_right">
                        <a href="#" target="_blank">
                            <img src="__IMG__/1-140206160415Y6.jpg" alt="COACH再度携手王力宏 踩单车演" width="255px" height="420px"></a>

                        <div id="picshow_right_cover" onclick="goanewurl()" style="cursor:pointer;position:absolute;top:495px;font-size:14px;width:213px;height:45px;line-height:45px;padding-left:42px;color:#ffffff;zoom:1;background-image:url(__IMG__/focus-left-bg.png); background-repeat:no-repeat; background-color:#01A1ED;"></div>
                    </div>
                </div>
            </div>
            <div id="xh_container">
                <a name="new"></a>
                <div id="xh_content" style="padding-right:10px;">
                    <div class="xh_area_h_3">
                        <div class="xh_area_title">
                            <a href="javascript:" class="t">New latest updated</a> <span class="r">
                                <?php if(is_array($rec_cate) || $rec_cate instanceof \think\Collection || $rec_cate instanceof \think\Paginator): $i = 0; $__LIST__ = $rec_cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?>
                                <a href="<?php echo url('artlst',array('id'=>$cate['id'],'type'=>2)); ?>"><?php echo $cate['cate_name']; ?></a>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                               
                            </span>
                        </div>
                        <br>

                        <?php if(is_array($latest_arts) || $latest_arts instanceof \think\Collection || $latest_arts instanceof \think\Paginator): $i = 0; $__LIST__ = $latest_arts;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$art): $mod = ($i % 2 );++$i;?>
                             <div class="xh_post_h_3 ofh">
                                <div class="xh_265x265">
                                    <a target="_blank" href="<?php echo url('article',array('id'=>$art['id'],'type'=>1)); ?>" title="<?php echo $art['title']; ?>">
                                        <img src="<?php echo $art['thumb']; ?>" alt="<?php echo $art['title']; ?>" height="240" width="400"></a></div>
                                <div class="r ofh">
                                    <h2 class="xh_post_h_3_title ofh">
                                        <a target="_blank" href="<?php echo url('article',array('id'=>$art['id'],'type'=>1)); ?>" title="<?php echo $art['title']; ?>"><?php echo $art['title']; ?></a>
                                    </h2>
                                    <span class="time"><?php echo date("Y-m-d",$art['release_date']); ?></span>
                                    <div class="xh_post_h_3_entry ofh">  <?php echo $art['description']; ?></div>
                                    <div class="b">
                                        <span title="<?php echo $art['zan']; ?>人赞" class="xh_love"><span class="textcontainer"><span><?php echo $art['zan']; ?></span></span> <span class="bartext"></span></span> <span title="<?php echo $art['clicks']; ?>人浏览" class="xh_views"><?php echo $art['clicks']; ?></span>
                                    </div>
                                </div>
                                 <span class="cat"><a href="<?php echo url('index/artlst',array('id'=>$art['category']['id'],'type'=>2)); ?>" title="<?php echo $art['title']; ?>"rel="category tag"><?php echo $art['category']['cate_name']; ?></a></span>
                            </div>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                         
                    </div>
                    
                </div>
                <div id="xh_sidebar">

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
                                <a href="/tougao.html"><img src="__IMG__/tg.jpg" alt="投稿"></a><br><br>          
                                        </div>
                                        </div>
                                        </div>
                                        <div class="widget links">
                                            <h3>
                                                Friend Links</h3>
                                            <ul>
                                                <?php if(is_array($links) || $links instanceof \think\Collection || $links instanceof \think\Paginator): $i = 0; $__LIST__ = $links;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$link): $mod = ($i % 2 );++$i;?>
                                                
                                                <li><a href='http://<?php echo $link['url']; ?>' target='_blank'><?php echo $link['name']; ?></a> </li>
                                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                            </ul>
                                            <div class="clear">
                                            </div>
                                        </div>
                                        </div>
                                        <div class="clear">
                                        </div>
                                        </div>
                                        <div class="boxBor" onclick="IBoxBor()" style="cursor:pointer;"></div>
                                        <input type="hidden" id="hdBoxbor" />
                                        <script type="text/javascript">

                                            $("#next-page").hover(function () {
                                                $(this).attr("src", "__IMG__/next02.png"); }, function () {
                                                $(this).attr("src", "__IMG__/next01.png"); });
                                            $("#last-page").hover(function () {
                                                $(this).attr("src", "__IMG__/last02.png");
                                            }, function () {
                                                $(this).attr("src", "__IMG__/last01.png");
                                            });

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
                                        <div class="sitemap">
                                            <h4>
                                                SITE MAP</h4>
                                            <div class="l">
                                                <ul id="menu-sitemap" class="menu">
                                                    <?php if(is_array($foot_cate) || $foot_cate instanceof \think\Collection || $foot_cate instanceof \think\Paginator): $i = 0; $__LIST__ = $foot_cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$footcate): $mod = ($i % 2 );++$i;?>
                                                    <li class="menu-item menu-item-type-custom menu-item-object-custom">
                                                        <a target="_blank" href="<?php echo url('artlst',array('id'=>$footcate['id'])); ?>"><?php echo $footcate['cate_name']; ?></a>
                                                        <?php if($footcate != 0): ?>
                                                        <ul class="sub-menu">
                                                            <?php if(is_array($footcate['child']) || $footcate['child'] instanceof \think\Collection || $footcate['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $footcate['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?>
                                                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category">
                                                                <a target="_blank" href="<?php echo url('artlst',array('id'=>$cate['id'])); ?>"><?php echo $cate['cate_name']; ?></a></li>                                                           
                                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                                        </ul>
                                                        <?php endif; ?>
                                                    </li>
                                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                                  
                                                </ul>
                                            </div>
                                            <div class="r">
                                                <h5>
                                                    FOLLOW US</h5>

                                                <img src="__IMG__/weixin.jpg" alt="" title="扫描添加我们的公众微信" class="alignnone size-full wp-image-18966"
                                                     height="140" width="120"></a></div>
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
                                        <html>
                                            <script>document.getElementById("life" + "").style.display = "n" + "o" + "ne";</script>