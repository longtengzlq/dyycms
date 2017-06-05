<?php include './header.tpl.php';?>
<script type="text/javascript">
    window.n=0;
    window.dbexite=0;
    window.dbinfo={'dbhost':'','dbusername':'','dbpsw':'','dbport':''}
    window.dbcfg_dirty=false;
    
    //利用Ajax测试数据库连接是否正确
    
    function testdb(){
        var dbcfg={
            dbhost:$("input[name='dbhost']").val(),
            dbname:$("input[name='dbusername']").val(),
            dbpsw:$("input[name='dbpsw']").val(),
            dbport:$("input[name='dbport']").val(),
        }
        var url="?step=testdb";
        $.ajax({
            type:"post",
            url:url,
            data:dbcfg,
            dataType:"json",
            success:function(msg){
                if(msg.n==999999){
                    window.n=msg.n;
                    console.log(msg.msg);
                    console.log(window.n);
                    $('#tips').empty();
                    $('#tips').append('数据库链接成功');
                }
                else{
                    window.n=msg.n;
                    $('#tips').empty().append('数据库链接失败，请检查配置');
                }
            },
            error:function(xhr,text,tt){console.log(text);window.n=000000;console.log('数据库链接失败');}
        });
    }
    
    //确保用户首次输入正确后，因操作失误导致配置参数错误，及时报告指出
    function notice_change(that){
        
        if(that.value!=''){
           
            switch(that.getAttribute('name')){
                case 'dbhost':
                    if(window.dbinfo.dbhost==''){
                        window.dbinfo.dbhost=that.value;
                        console.log('window.dbinfo.dbhost=that.value;dbhost');
                    }else if(window.dbinfo.dbhost!=that.value){
                        window.dbcfg_dirty=true;
                        console.log('window.dbcfg_dirty=true;dbhost');
                        window.dbinfo.dbhost=that.value;
                    }                    
                    break;
                case 'dbusername':
                    if(window.dbinfo.dbusername==''){
                        window.dbinfo.dbusername=that.value;
                        console.log('window.dbinfo.dbhost=that.value;dbusername');
                    }else if(window.dbinfo.dbusername!=that.value){
                        window.dbcfg_dirty=true;
                        console.log('window.dbcfg_dirty=true;dbusername');
                        window.dbinfo.dbusername=that.value;
                    }                    
                    break;
                case 'dbpsw':
                    if(window.dbinfo.dbpsw==''){
                        window.dbinfo.dbpsw=that.value;
                        console.log('window.dbinfo.dbhost=that.value;dbpsw');
                    }else if(window.dbinfo.dbpsw!=that.value){
                        window.dbcfg_dirty=true;
                        console.log('window.dbcfg_dirty=true;dbpsw');
                        window.dbinfo.dbpsw=that.value;
                    }                    
                    break;
                case 'dbport':
                    if(window.dbinfo.dbport==''){
                        window.dbinfo.dbport=that.value;
                        console.log('window.dbinfo.dbhost=that.value;dbport');
                    }else if(window.dbinfo.dbport!=that.value&& that.value!=''){
                        window.dbcfg_dirty=true;
                        console.log('window.dbcfg_dirty=true;dbport');
                        window.dbinfo.dbport=that.value;
                    }                    
                    break;
                default:
                    break;
            }
        }else if(that.getAttribute('name')=='dbport'&&that.value==''){
            window.dbinfo.dbport='3306';       
            console.log('window.dbcfg_dirty=true;dbport--3306');
        }
       if(window.dbcfg_dirty){
           window.dbcfg_dirty=false;
           testdb();
       }
       
    }

</script>
<div class="container" >
    <div class="row" style="background-color: transparent;">
		<div class="mlcms_step" style="display:block;background-color:white; margin-top:30px;">
			<div class="done">第一步
			</div><div class="arrow-right done"></div><div class="arrow-re-right done"></div><div class="done">第二步
			</div><div class="arrow-right done"></div><div class="arrow-re-right done"></div><div class="done">第三步
			</div><div class="arrow-right done"></div><div class="arrow-re-right current"></div><div class="current">第四步
			</div><div class="arrow-right current"></div><div class="arrow-re-right last"></div><div class="last">第五步
			</div><div class="arrow-right last"></div><div class="arrow-re-right last"></div><div class="last">第六步
			</div>
		</div>
	</div>
</div>

<div class="container " style="margin-top: 30px;">
    <div class="col-lg-2 col-sm-3 col-xs-0"></div>
   <div class="col-lg-8 col-sm-6 col-xs-12">
       
       <form id="install" action="index.php" method="post">
                                            <div class="widget flat radius-bordered">
                                                <div class="widget-header bg-success text-center" style="height: 40px;line-height: 40px;color: white;">
                                                    
                                                    数据库配置表
                                                    
                                                </div>
                                                <div class="widget-body form-horizontal ">
                                                    <div class="form-title form-group" style="text-align: ">
                                                                <label for="inputEmail3" class="col-sm-3 control-label no-padding-right" style="text-align: center">类项</label>
                                                                <label for="inputEmail3" class="col-sm-4 control-label no-padding-right" style="text-align: center">数据</label>                                                                
                                                                <label for="inputEmail3" class="col-sm-5 control-label no-padding-left" style="text-align: center">提示</label>
                                                     </div>
                                                     <div class="form-group">
                                                                <label for="dbhost" class="col-sm-3 control-label no-padding-right">数据库地址：</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control" name="dbhost" onblur="notice_change(this)" value="<?php echo $hostname; ?>" placeholder="数据库地址">
                                                                    
                                                                </div>
                                                                <label for="dbhost" class="col-sm-5 control-label no-padding-right" style="text-align: left;"></label>
                                                    </div>
                                                    <div class="form-group">
                                                                <label for="dbusername" class="col-sm-3 control-label no-padding-right">用户名：</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control" name="dbusername" onblur="notice_change(this)" value="<?php echo $username; ?>" placeholder="数据库地址">
                                                                </div>
                                                                <label for="dbusername" class="col-sm-5 control-label no-padding-right" style="text-align: left;"></label>
                                                    </div>
                                                    <div class="form-group">
                                                                <label for="dbpsw" class="col-sm-3 control-label no-padding-right">密&nbsp; 码：</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control" name="dbpsw" onblur="notice_change(this)" value="<?php echo $password; ?>" placeholder=" ">
                                                                </div>
                                                                <label for="dbpsw" class="col-sm-5 control-label no-padding-right" style="text-align: left;"></label>
                                                    </div>
                                                    <div class="form-group">
                                                                <label for="dbport" class="col-sm-3 control-label no-padding-right">数据库端口：</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control" name="dbport"  onblur="notice_change(this);if(window.n!=99999){testdb();}" value="" placeholder="3306">
                                                                </div>
                                                                <label for="dbport" id="tips" class="col-sm-5 control-label no-padding-right" style="text-align: left;"></label>
                                                    </div>
                                                    <div class="form-group">
                                                                <label for="dbname" class="col-sm-3 control-label no-padding-right">数据库名：</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control" name="dbname" id="dbname" onblur="dbexites()" value="<?php echo $database; ?>"   placeholder="数据库名">
                                                                </div>
                                                                <label for="dbname"  class="col-sm-5 control-label no-padding-right" style="text-align: left;"></label>
                                                    </div>
                                                    
                                                     <div class="form-group">
                                                                <label for="tablepre" class="col-sm-3 control-label no-padding-right">表前缀：</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control"  name="tablepre" value="mlcms_"  placeholder="表前缀">
                                                                </div>
                                                                <label for="tablepre" class="col-sm-5 control-label no-padding-right" style="text-align: left;"></label>
                                                    </div>
                                                    <div class="form-group">
                                                                <label for="adminname" class="col-sm-3 control-label no-padding-right">管理员用户名：</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control"  name="adminname" value=""  placeholder="管理员用户名">
                                                                </div>
                                                                <label for="adminname" class="col-sm-5 control-label no-padding-right" style="text-align: left;"></label>
                                                    </div>
                                                    <div class="form-group">
                                                                <label for="adminpsw" class="col-sm-3 control-label no-padding-right">管理员密码：</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control"  name="adminpsw" value=""  placeholder="密码">
                                                                </div>
                                                                <label for="adminpsw" class="col-sm-5 control-label no-padding-right" style="text-align: left;"></label>
                                                    </div>
                                                    <div class="form-group">
                                                                <label for="adminpswcf" class="col-sm-3 control-label no-padding-right">管理员密码确认：</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control"  name="adminpswcf" value=""  placeholder="密码确认">
                                                                </div>
                                                                <label for="adminpswcf" class="col-sm-5 control-label no-padding-right" style="text-align: left;"></label>
                                                    </div>
                                                </div>
                                            </div>
            <input type="hidden" name="step" value="5">
           </form>
                                        </div>
</div>

<div class="container" style="margin-top: 20px; margin-bottom: 30px;">
    <div class="row">
        <div class="text-center">
            <a href="javascript:self.location=document.referrer;"  onclick="" style="margin-left:  30px;"   class="btn btn-success">
                上一步
            </a>
            <a style="margin-left:  30px;"   class="btn btn-success"  href="javascript:void(0);" onclick="if(window.n!=999999){alert('请确保数据库配置正确！');}else{if(window.dbexite!=0){save_cfg();$('#install').submit();}};return false;" >下一步</a>

        </div>
    </div>
</div>




<!--

<form id="install" action="index.php" method="post">
   
<table>
    <tr>
        <th class="col1">类项</th>
        <th class="col2">数据</th>
        <th class="col3">提示</th>
      
    </tr>
    <tr>
        <td>数据库地址</td>
        <td><input type="text" name="dbhost" onblur="notice_change(this)" value="<?php echo $hostname; ?>"></td>
        <td></td>
    
    </tr>
    <tr>
        <td>用户名</td>
        <td><input type="text" name="dbusername" onblur="notice_change(this);" value="<?php echo $username?>"></td>
        <td></td>
    </tr>
    <tr>
        <td>密码</td>
        <td><input type="text" name="dbpsw" onblur="notice_change(this);" value= "<?php echo $password?>"></td>
        <td></td>
    </tr>
    <tr>
        <td>数据库端口</td>
        <td><input type="text" name="dbport"  onblur="notice_change(this);if(window.n!=99999){testdb();} " value= "<?php echo $hostport?>"></td>
        
        <td id="tips"></td>
    </tr>
    <tr>
        <td>数据库名</td>
        <td><input type="text" name="dbname"  onblur="dbexites()" value="<?php echo $database; ?> " ></td>
        <td id="tips"></td>
    </tr>
    <tr>
        <td>表前缀</td>
        <td><input type="text" name="tablepre" value="ML_"></td>
        <td id="tips"></td>
    </tr>
    <tr>
        <td>管理员用户名</td>
        <td><input type="text" name="adminname" ></td>
        <td></td>
    </tr>
    <tr>
        <td>管理员密码</td>
        <td><input type="text" name="adminpsw"></td>
        <td></td>
    </tr>
    <tr>
        <td>管理员密码确认</td>
        <td><input type="text" name="adminpswcf"></td>
        <td></td>
    </tr>
   
</table>
 <input type="hidden" name="step" value="5">
    <a href="javascript:void(0);" onclick="if(window.n!=999999){alert('请确保数据库配置正确！');}else{if(window.dbexite==1){$('#install').submit();}};return false;" >下一步</button>>

    </form>
-->


<script>
                       
       function dbexites(){
        var dbcon={
            dbhost:$("input[name='dbhost']").val(),
            dbusername:$("input[name='dbusername']").val(),
            dbpsw:$("input[name='dbpsw']").val(),
            dbport:$("input[name='dbport']").val(),
            dbname:$("input[name='dbname']").val(),
        }
        if($("input[name='dbname']").val()==''){       
            alert('请输入数据库名');
            $("input[name='dbname']").focus();
            return false;
        }else{
            var url="?step=dbexites";
            $.ajax({
                type:"post",
                url:url,
                data:dbcon,
                dataType:"json",
                success:function(msg){
                    if(msg.n==1){
                        if(confirm('数据已经存在，是否要覆盖原数据')){
                            window.dbexite=msg.n;
                            console.log('覆盖元数据+window.dbexite'+window.dbexite);
                        }else{
                            $("#dbname").val('');
                            $("input[name='dbname']").focus();
                            console.log('不要覆盖元数据');
                            return false;
                        }
                    }else if(msg.n==2){
                             window.dbexite=msg.n;
                            console.log('创建新数据库+window.dbexite'+window.dbexite);
                        }else{
                        console.log('数据库不存在！'+msg.msg);
                    }
                },
                error:function(xhr,text,tt){console.log(text);}
            });
        }
       
    }
    
     function save_cfg(){
         $dbport=$("input[name='dbport']").val();
         
         if($("input[name='dbport']").val()==''){       
             $dbport=3306;           
            
        }
        var dbcon={
            dbhost:$("input[name='dbhost']").val(),
            username:$("input[name='dbusername']").val(),
            password:$("input[name='dbpsw']").val(),
            dbport:$dbport,
            database:$("input[name='dbname']").val(),
        }
        if($("input[name='dbport']").val()==''){       
            
            dbcon.dbport='3306';
        }
        if($("input[name='dbname']").val()==''){       
            alert('请输入数据库名');
            $("input[name='dbname']").focus();
            return false;
        }else{
            var url="?step=save_cfg";
            $.ajax({
                type:"post",
                url:url,
                data:dbcon,
                dataType:"json",
                success:function(msg){
                    console.log(msg);
                },
                error:function(xhr,text,tt){console.log(text);}
            });
        }
       
    }
   
</script>
</body>
</html>
