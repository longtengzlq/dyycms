<?php include './header.tpl.php';?>
<?php
    $path= ROOT_PATH.DS.'uploads'; 
    
?>
<div class="container" >
    <div class="row" style="background-color: transparent;">
		<div class="mlcms_step" style="display:block;background-color:white; margin-top:30px;">
			<div class="done">第一步
			</div><div class="arrow-right"></div><div class="arrow-re-right"></div><div class="done">第二步
			</div><div class="arrow-right"></div><div class=" current arrow-re-right"></div><div class="current">第三步
			</div><div class="arrow-right current"></div><div class="arrow-re-right last"></div><div class="last">第四步
			</div><div class="arrow-right last"></div><div class="arrow-re-right last"></div><div class="last">第五步
			</div><div class="arrow-right last"></div><div class="arrow-re-right last"></div><div class="last">第六步
			</div>
		</div>
	</div>
</div>
<div class="container ">
    <div class="row">
        <div class="text-center mlcms_install_title"><h2>文件目录读写检测</h2></div>
    </div>
    <div class="row">
        <div class="center" style="background-color: #FBFBFB;margin-top: 20px; padding: 30px;font-size: 13px;line-height: 25px;">
            <table class="table table-hover table-striped table-bordered ">
                <thead class="bordered-success">
                    <tr>
                        <th>
                            文件名称
                        </th>
                        <th>
                            是否可写
                        </th>
                        <th>
                            要求
                        </th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>/public/uploads</td>
                        <td><?php if(can_write($path)) { ?> 
                            <span class="glyphicon glyphicon-ok success">
                            <?php } else { ?> 
                                <span class="glyphicon glyphicon-remove danger">
                            <?php } ?>
                          </td>
                        <td><span class="glyphicon glyphicon-ok success"></span></td>
                    </tr>
                </tbody>
            </table>
            
        </div>
        
    </div>
</div>
<div class="container" style="margin-top: 20px; margin-bottom: 30px;">
    <div class="row">
        <div class="text-center">
            <a href="javascript:self.location=document.referrer;"  onclick="" style="margin-left:  30px;"   class="btn btn-success">
                上一步
            </a>
            <a href="javascript:void(0);"  onclick="$('#install').submit();return false;" style="margin-left:  30px;"   class="btn btn-success">下一步</a>
           
        </div>
    </div>
</div>


    <form id="install" action="index.php" method="get">
        <input type="hidden" name="step" value="4">
    </form>
</body>
</html>
<?php
function can_write($path) {
    if (is_writable($path)) {        
        if(is_dir($path)){
            $files = scandir($path);
            if(count($files)!=2){
                foreach ($files as $value) {
                    if($value!='.'&&$value!='..'){
                        if(!can_write($path.DS.$value)){
                            return FALSE; 
                        }                   
                    } else {
                        continue;
                    }                   
                }
                 return TRUE;
            } else {    
                return true;
            }            
        } else {
            if(is_file($path)){
                return TRUE;
            } else {
                return FALSE;
            }             
        }
    } else {
        return FALSE;
    }
   
}
/* 检查那个文件不可写工具
function can_writed($path) {
    echo '........'.$path.'.........</br>';
    if (is_writable($path)) {        
        if(is_dir($path)){
            $files = scandir($path);

            if(count($files)!=2){
                foreach ($files as $value) {
                    if($value!='.'&&$value!='..'){
                        if(can_write($path.DS.$value)){
                             
                        }else{
                            echo $path.'the path can\'not write</br>';
                            return FALSE;   
                        }                       
                    } else {
                        continue;
                    }                   
                }
                echo $path.'dir can write</br>';
                return TRUE;
            } else {                
                echo $path.'dir can write</br>';
                return true;
            }            
        } else {
            if(is_file($path)){
                echo $path.' file can write</br>';
                return TRUE;
            } else {
                echo $path.' I don\'t know what it is</br>';
                return FALSE;
            }             
        }

    } else {
        echo $path.'the path can\'not write</br>';
        return FALSE;
    }
   
}
 * 
 */
?>