<?php include './header.tpl.php';?>
<div class="container" >
	<div class="row">
		<div class="mlcms_step" style="display:block;background-color:white; margin-top:30px;">
			<div class="current">第一步
			</div><div class="arrow-right current"></div><div class="arrow-re-right last"></div><div class="last">第二步
			</div><div class="arrow-right last"></div><div class="arrow-re-right last"></div><div class="last">第三步
			</div><div class="arrow-right last"></div><div class="arrow-re-right last"></div><div class="last">第四步
			</div><div class="arrow-right last"></div><div class="arrow-re-right last"></div><div class="last">第五步
			</div><div class="arrow-right last"></div><div class="arrow-re-right last"></div><div class="last">第六步
			</div>
		</div>
	</div>
</div>
<div class="container ">
	<div class="row">
            <div class="text-center mlcms_install_title"><h2>请仔细阅读安装协议</h2></div>
	</div>
    <div class="row">
        <div class="" style="background-color: #FBFBFB;margin-top: 20px; padding: 30px;font-size: 13px;line-height: 25px;">
            <?php
                echo $license;
            ?>
        </div>
    </div>
</div>


<div class="container" style="margin-top: 20px; margin-bottom: 30px;">
    <div class="row">
        <div class="text-center">
            <label>
                <input type="checkbox" id="check"  class="colored-success" >
                <span class="text"></span>
                
            </label>
            <span>我同意</span>
            <a href="javascript:void(0);"  onclick="check(this);return false;" style="margin-left:  30px;"   class="btn btn-success">下一步</a>
           
        </div>
    </div>
</div>
<script>
    $("#check").click(function(){           
         $("#check").attr('checked',this.checked) ;          
        });
    function check(obj){
       ;
        if($('#check').attr('checked')=='checked'){
            $('#install').submit();
            return false;
        }
        
    }
</script>

    <form id="install" action="index.php" method="get">
        <input type="hidden" name="step" value="2">
    </form>

</body>
</html>