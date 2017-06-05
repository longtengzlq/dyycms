<?php include './header.tpl.php';?>

<div class="container" >
    <div class="row" style="background-color: transparent;">
		<div class="mlcms_step" style="display:block;background-color:white; margin-top:30px;">
			<div class="done">第一步
			</div><div class="arrow-right done"></div><div class="arrow-re-right done"></div><div class="done">第二步
			</div><div class="arrow-right done"></div><div class="arrow-re-right done"></div><div class="done">第三步
			</div><div class="arrow-right done"></div><div class="arrow-re-right done"></div><div class="done">第四步
			</div><div class="arrow-right done"></div><div class="arrow-re-right current"></div><div class="current">第五步
			</div><div class="arrow-right current"></div><div class="arrow-re-right last"></div><div class="last">第六步
			</div>
		</div>
	</div>
</div>

<div class="container " style="margin-top: 30px; ">
    <div class=" col-lg-2 col-md-2 col-sm-2"></div>
    <div class="widget col-lg-8 col-md-8 col-sm-8">
        <div class="widget-header bordered-bottom bordered-success " style="text-align: center">
            <label style="height: 30px;line-height: 30px;">安装过程</label>
                                        </div>
                                        <div class="widget-body">
                                            <div id="horizontal-form">
                                                <form class="form-horizontal" role="form">
                                                    
                                                     <div id="contents" style="height:350px;background-color: white; margin: 20px; padding: 30px 20px;font-size: 12px; line-height: 22px;overflow-y:  scroll;"></div>
                                                  
                                                    <div>
                                                       
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
    <div class="col-lg-2 col-sm-3 col-xs-0"></div>
   
</div>


<div class="container" style="margin-top: 20px; margin-bottom: 30px;  ">
    <div class="row">
        <div class="text-center">
            <a href="javascript:self.location=document.referrer;"  onclick="" style="margin-left:  30px;"   class="btn btn-success">
                上一步
            </a>
            <a style="margin-left:  30px;"   class="btn btn-success"  href="javascript:void(0);" onclick="$('#install').submit();return false;" >下一步</a>

        </div>
    </div>
</div>
    <form id="install" action="index.php" method="post">
        <input type="hidden" name="step" value="6">
        <input type="hidden" name="n" value="1">

        <input type="hidden" id="dosubmit">
    </form>
    

</body>
    <script type="text/javascript">
        var n=-1;
        $.ajaxSetup({cache:false});
        var data={
            dbhost:'<?php echo $rq->post('dbhost');?>',
            dbusername:'<?php echo $rq->post('dbusername');?>',
            dbpsw:'<?php echo $rq->post('dbpsw');?>',
            tablepre:'<?php echo $rq->post('tablepre');?>',
            dbport:'<?php echo $rq->post('dbport');?>',
            dbname:'<?php echo $rq->post('dbname');?>',
            adname:'<?php echo $rq->post('adminname');?>',
            adpsw:'<?php echo $rq->post('adminpsw')?>',
        }
        function reloads(n){
            url =  "<?php echo $_SERVER['PHP_SELF']; ?>?step=install&n="+n;
            $.ajax({
            type: "POST",		
            url: url,
            data: data,
            dataType: 'json',
            beforeSend:function(){
            },
            success: function(msg){
                if(msg.n=='999999'){
                    $('#dosubmit').attr("disabled",false);
                    $('#dosubmit').removeAttr("disabled");				
                    $('#dosubmit').removeClass("nonext");
                 //   setTimeout('gonext()',2000);
                }
                if(msg.n>=0&&msg.n!=999999){
                    $('#contents').append(msg.msg);	
                    reloads(msg.n);	
                }else{
                    //alert('指定的数据库不存在，系统也无法创建，请先通过其他方式建立好数据库！');
                   
                   $('#contents').append(msg.msg);
                }			 
            },
            error:function(xhr,text,tt){console.log(text); console.log(tt); console.log(xhr);}
        });
    }
        $(function(){reloads(n);});
    
    </script>
</html>