<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:63:"C:\myweb\TP\public/../application/index\view\index\article.html";i:1496908102;s:63:"C:\myweb\TP\public/../application/index\view\common\header.html";i:1496917587;s:63:"C:\myweb\TP\public/../application/index\view\common\footer.html";i:1496908060;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $system['site_name']; ?></title>
        <meta name="description" content="<?php echo $system['site_description']; ?>" />
        <meta name="keywords" content="<?php echo $system['site_keywords']; ?>" />

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
        <link rel="stylesheet" href="__CSS__/article.css" type="text/css" />
        <script language="javascript" type="text/javascript" src="/include/dedeajax2.js"></script>
        <script language="javascript" type="text/javascript">
<!--

            function postBadGood(ftype, fid)
            {
                var taget_obj = document.getElementById(ftype + fid);
                var saveid = GetCookie('badgoodid');
                if (saveid != null)
                {
                    var saveids = saveid.split(',');
                    var hasid = false;
                    saveid = '';
                    j = 1;
                    for (i = saveids.length - 1; i >= 0; i--)
                    {
                        if (saveids[i] == fid && hasid)
                            continue;
                        else {
                            if (saveids[i] == fid && !hasid)
                                hasid = true;
                            saveid += (saveid == '' ? saveids[i] : ',' + saveids[i]);
                            j++;
                            if (j == 10 && hasid)
                                break;
                            if (j == 9 && !hasid)
                                break;
                        }
                    }
                    if (hasid) {
                        alert('您刚才已表决过了喔！');
                        return false;
                    } else
                        saveid += ',' + fid;
                    SetCookie('badgoodid', saveid, 1);
                } else
                {
                    SetCookie('badgoodid', fid, 1);
                }
                myajax = new DedeAjax(taget_obj, false, false, '', '', '');
                myajax.SendGet2("/plus/feedback.php?aid=" + fid + "&action=" + ftype + "&fid=" + fid);
            }
            function postDigg(ftype, aid)
            {
                var taget_obj = document.getElementById('newdigg');
                var saveid = GetCookie('diggid');
                if (saveid != null)
                {
                    var saveids = saveid.split(',');
                    var hasid = false;
                    saveid = '';
                    j = 1;
                    for (i = saveids.length - 1; i >= 0; i--)
                    {
                        if (saveids[i] == aid && hasid)
                            continue;
                        else {
                            if (saveids[i] == aid && !hasid)
                                hasid = true;
                            saveid += (saveid == '' ? saveids[i] : ',' + saveids[i]);
                            j++;
                            if (j == 20 && hasid)
                                break;
                            if (j == 19 && !hasid)
                                break;
                        }
                    }
                    if (hasid) {
                        alert("您已经顶过该帖，请不要重复顶帖 ！");
                        return;
                    } else
                        saveid += ',' + aid;
                    SetCookie('diggid', saveid, 1);
                } else
                {
                    SetCookie('diggid', aid, 1);
                }
                myajax = new DedeAjax(taget_obj, false, false, '', '', '');
                var url = "/plus/digg_ajax.php?action=" + ftype + "&id=" + aid;
                myajax.SendGet2(url);
            }
            function getDigg(aid)
            {
                var taget_obj = document.getElementById('newdigg');
                myajax = new DedeAjax(taget_obj, false, false, '', '', '');
                myajax.SendGet2("/plus/digg_ajax.php?id=" + aid);
                DedeXHTTP = null;
            }
-->
        </script>
<script type="text/javascript">

        function ILike(th, v) {
    if(v){        $(th).addClass("single_views_over");
        } else {
        $(th).removeClass("single_views_over");
        }
        }

</script>
 
</head>        
<body class="single2">
   <script>
       function subForm()
       {

           formsearch.submit();
           //form1为form        的id
       }
 </script>
<script type="text/javascript">
    function showMask() {
        $("#mask").css("height", $(document).height());
        $("#mask").c        ss("width", $(document).width());
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
    <div id="wrapper">

    <div id="wrapper">
        <div id="container">
            <div id="content">
                <div class="post" id="post-19        563" style="border-right: solid 1px #000000; min-height: 1700px;
                    margin-top: 10px;">
                    <div class="path"><a href='#'>主页</a> ><?php if(is_array($position) || $position instanceof \think\Collection || $position instanceof \think\Paginator): $i = 0; $__LIST__ = $position;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?>
            <a href="<?php echo url('artlst',array('id'=>$cate['id'],'type'=>2)); ?>"><?php echo $cate['cate_name']; ?></a> >
            <?php endforeach; endif; else: echo "" ;endif; ?> </div>
                    <div class="single_entry single2_entry">
                        <div class="entry fewcomment">
                            <div class="title_container">
                                <h2 class="title single_title">
                                    <span><?php echo $article['title']; ?></span><span class="title_date"></span></h2>
                                <p class="single_info">时间：<?php echo date("Y-m-d",$article['release_date']); ?>&nbsp;&nbsp;&nbsp;编辑：<?php echo $article['editor']; ?></p>
                        </div>
                            <div class="div-content">
                               
                                <p>
                                    <p>（本文作者：<?php echo $article['author']; ?>）</p>
<p>
<?php echo $article['content']; ?>                                        
</p><p></p><p class="pagepage"></p>
                                
                                <center id="pagenav">
                                    </center>
                                <div id="BottomNavOver" style="height: 80px;">
               <div style="float: left; font-size: 12px;">
                                        
                                    </div>
                                    <div style="float: right; padding-right: 20px; width: 120px;" class="div">
                                        <table cellpadding="0"         cellspacing="0" border="0" style="background-color: transparent;
                                            border: 0px solid #EEEEEE; border-collapse: collapse; margin: 5px 0 10px;">
                                            <tr>
                                                <td style="border-width: 0px; padding: 0px; padding-right: 4px;">

                                                </td>
                                                <td style="border-width: 0px; padding: 0px;">
                                                    <!-- JiaThis Button BEGIN -->
                                                    <div class="jiathis_style">
                                                        <a class="jiathis_button_qzone"></a><a class="jiathis_button_tqq"></a><a class="jiathis_button_renren">
                                                        </a><a class="jiathis_button_kaixin001"></a><a href="http://www.jiathis.com/share"
                                                            class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
                                                    </div>
                                                    <script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1365565447348652"
                                                        charset="utf-8"></script>
                                                    <!-- JiaThis Button END -->
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div style="float: right; width: 60px; font-size: 12px;">
                                        分享至：</div>
                                    <div style="clear: both;">
                                    </div>
                                </div>
                            </div>
                            <div class="clear">
                            </div>
                            <div id="ctl00_ctl00_ContentPlaceHolder1_contentPlace_divRead">
                                <div style="text-align: left; wid        th: 100%; border-bottom: solid 1px #e0e0e0; padding-bottom: 4px;
                                    color: Black; vertical-align: middle; font-weight: bold;">
                                    &nbsp;&nbsp;猜您喜欢的文章
                                </div>
                                <ul class="read" style="list-style-type: none; margin-top: 10px; width: 780px;">

                                    <?php if(is_array($relates) || $relates instanceof \think\Collection || $relates instanceof \think\Paginator): $i = 0; $__LIST__ = $relates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$relate): $mod = ($i % 2 );++$i;?>
<li style="margin-left: -10px; margin-right: 16px; margin-top: 20px; height: 180px;"> <a href="<?php echo url('article',array('id'=>$relate[0])); ?>" target="_blank"><img src="<?php echo $relate[4]; ?>" style="width: 250px; height: 150px; margin-bottom: 0px;" />
<span style="margin: 0px; padding: 0px; margin-top: -5px;"><?php echo $relate[1]; ?></span></a></li>

                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                            </div>
                            <div class="clear">
                            </div>
                            <div class="comments_wrap" style="margin-top: 35px;">
                                <a name="comment"></a>
          <!-- Duoshuo Comment BEGIN -->
          <div class="ds-thread" data-thread-key="" 
    data-title="" data-author-key        ="" data-url=""></div>
          <script type=        "text/javascript">
    var duoshuoQuery = {short_name: "dede58"};
    (function () {
        var ds = document.createElement('script');
        ds.type = 'text/javascript';ds.async = true;
        ds.src = 'http://static.duoshuo.com/embed.js';
        ds.charset = 'UTF-8';
        (document.getElementsByTagName('head')[0]
                || document.getElementsByTagName('body')[0]).appendChild(ds);
    })();
    </script> 
          <!-- Duoshuo Comment END --> 
                            </div>
                            <div class="clear">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sidebar">
                <div class="widge        t single" style="margin-bottom: 0px; margin-left: 0px; margin-top: 40px;
                    padding-bottom: 0px;" id="newdigg">
                    <div class="single_views" onmouseout="ILike(this, false)" onmouseover="ILike(this, true)">
                        <span class="textcontainer"><span class="votecount26536"><?php echo $article['zan']; ?></span></span> <span class="bartext voteid26536"><a href="#"
                                id="aZanImg" onclick="add_zan(<?php echo $article['id']; ?>,this)"></a></span><span class="text" id="spanZan">赞</span>
           <span class="text love">人</span>
                    </div>


                </div>
  <script language="javascript" type="text/javascript">getDigg(382);</script>
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
            <a href="/tougao.html"><img src="__IMG__/tg.jpg" alt="投稿"></a><br><br>          
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
    </div>
    <script type="text/javascript" src="__JS__/z700bike_global.js"></script>
    <script type="text/javascript" src="__JS__/z700bike_single.js"></script>
  
    <script type='text/javascript' src='/blog4__JS__/jquery.colorbox-min.js?ver=1.3.17.2'></script>


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
<script>
    function add_zan(id,obj){
    
     $.ajax({
              url:"<?php echo url('addZan'); ?>",
                data:{'id':id},
                success:function(msg){
                console.log(msg);
                $(".votecount26536")[0].innerHTML=msg;
                },
                error:function (XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown)
                },
            });
         
    }
    
</script>
 
</body>
</html>
