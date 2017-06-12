<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:42:"C:\myweb\TP\thinkphp\tpl\dispatch_jump.tpl";i:1497251265;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>跳转提示</title>
    
    <script src="__JS__/jquery_002.js"></script>
    <script src="__THIRD__/layer/layer.js"></script>
</head>
<body>
    <div class="system-message">
        <input type="hidden" id="msg" name="msg" value="<?php echo(strip_tags($msg)); ?>">
        <input type="hidden" id="url" name="url" value="<?php echo($url); ?>">
        <input type="hidden" id="wait" name="wait" value="<?php echo($wait)?>">
        <input type="hidden" id="code" name="code" value="<?php echo($code)?>">
      
    </div>
    <script type="text/javascript">
        (function(){
            var msg = $('#msg').val();
            var wait = $('#wait').val();
            var url = $('#url').val();
            var code=$('#code').val();
            if(code == '0'){
                layer.msg(msg, {
                icon: 2,
                time: 2000 //2秒关闭（如果不配置，默认是3秒）
                    }, function(){
                    location.href = url;
                    });   
                }else{
                   layer.msg(msg, {
                    icon: 1,
                    time: 2000 //2秒关闭（如果不配置，默认是3秒）
                    }, function(){
                    location.href = url;
                    });
                }
            
                   })();
    </script>
</body>
</html>
