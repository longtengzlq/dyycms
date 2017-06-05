<?php include './header.tpl.php'; ?>
<script type="text/javascript">

</script>

<div class="container" >
    <div class="row">
        <div class="mlcms_step" style="display:block;background-color:white; margin-top:30px;">
            <div class="done">第一步
            </div><div class="arrow-right done"></div><div class="arrow-re-right current"></div><div class="current">第二步
            </div><div class="arrow-right current"></div><div class="arrow-re-right last"></div><div class="last">第三步
            </div><div class="arrow-right last"></div><div class="arrow-re-right last"></div><div class="last">第四步
            </div><div class="arrow-right last"></div><div class="arrow-re-right last"></div><div class="last">第五步
            </div><div class="arrow-right last"></div><div class="arrow-re-right last"></div><div class="last">第六步
            </div>
        </div>
    </div>
</div>
<div class="container ">
    <div class="row">
        <div class="text-center mlcms_install_title"><h2>安装环境检测</h2></div>
    </div>
    <div class="row">
        <div class="center" style="background-color: #FBFBFB;margin-top: 20px; padding: 30px;font-size: 13px;line-height: 25px;">
            <table class="table table-hover table-striped table-bordered ">
                <thead class="bordered-success">
                    <tr>
                        <th>
                            检查项目
                        </th>
                        <th>
                            当前环境
                        </th>
                        <th>
                            系统建议
                        </th>
                        <th>
                            功能影响
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>操作系统</td>
                        <td><?php if (stripos(PHP_OS, "WIN") !== FALSE) {
                            echo 'Windows';
                        } else {
                             echo PHP_OS;
                        } ?></td>
                        <td>Windows_NT/Linux/Freebsd</td>
                        <td><span class="glyphicon glyphicon-ok success"></span></td>
                    </tr>
                    <tr>
                        <td>WEB 服务器</td>
                        <td><?php echo $_SERVER['SERVER_SOFTWARE']; ?></td>
                        <td>IIS/Apache/Nginx</td>
                        <td><span class="glyphicon glyphicon-ok success"></span></td>
                    </tr>
                    <tr>
                        <td>PHP 版本</td>
                        <td><?php echo PHP_VERSION ?></td>
                        <td>>5.6.0</td>
                        <td><span class="glyphicon glyphicon-ok success"></span></td>
                    </tr>
                    <tr>
                        <td>MYSQLI 扩展</td>
                        <td><?php if (extension_loaded('mysqli')) { ?> 
                            <span class="glyphicon glyphicon-ok success">
                            <?php } else { ?> 
                                <span class="glyphicon glyphicon-remove danger">
                            <?php } ?>
                        </td>
                        <td><span class="glyphicon glyphicon-ok success"></span></td>
                        <td>
                           <?php if (extension_loaded('mysqli')) { ?> 
                            <span class="glyphicon glyphicon-ok success">
                            <?php } else { ?> 
                                <span class="glyphicon glyphicon-remove danger">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>ICONV/MB_STRING 扩展</td>
                        <td><?php if (extension_loaded('mbstring')) {?> 
                            <span class="glyphicon glyphicon-ok success">
                            <?php } else { ?> 
                                <span class="glyphicon glyphicon-remove danger">
                            <?php } ?>
                         </td>
                        <td>
                            <span class="glyphicon glyphicon-ok success"></span>
                        </td>
                        <td>
                            <?php if (extension_loaded('mbstring')) {?> 
                            <span class="glyphicon glyphicon-ok success">
                            <?php } else { ?> 
                                <span class="glyphicon glyphicon-remove danger">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>JSON扩展</td>
                        <td><?php if (extension_loaded('json')) { ?> 
                            <span class="glyphicon glyphicon-ok success">
                            <?php } else { ?> 
                                <span class="glyphicon glyphicon-remove danger">
                            <?php } ?>
                        </td>
                        <td><span class="glyphicon glyphicon-ok success"></span></td>
                        <td>
                            <?php if (extension_loaded('json')) { ?> 
                            <span class="glyphicon glyphicon-ok success">
                            <?php } else { ?> 
                                <span class="glyphicon glyphicon-remove danger">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>GD 扩展</td>
                        <td>
                            <?php if (extension_loaded('gd')) {?> 
                            <span class="glyphicon glyphicon-ok success">
                            <?php } else { ?> 
                                <span class="glyphicon glyphicon-remove danger">
                            <?php } ?>
                        </td>
                        <td><span class="glyphicon glyphicon-ok success"></span></td>
                        <td>
                            <?php if (extension_loaded('gd')) {?> 
                            <span class="glyphicon glyphicon-ok success">
                            <?php } else { ?> 
                                <span class="glyphicon glyphicon-remove danger">
                            <?php } ?>
                                </td>
                    </tr>
                    <tr>
                        <td>ZLIB 扩展</td>
                        <td>
                            <?php if (extension_loaded('zlib')) {?> 
                            <span class="glyphicon glyphicon-ok success">
                            <?php } else { ?> 
                                <span class="glyphicon glyphicon-remove danger">
                            <?php } ?>
                        </td>
                        <td><span class="glyphicon glyphicon-ok success"></span></td>
                        <td>
                            <?php if (extension_loaded('zlib')) {?> 
                            <span class="glyphicon glyphicon-ok success">
                            <?php } else { ?> 
                                <span class="glyphicon glyphicon-remove danger">
                            <?php } ?>
                                </td>
                    </tr>
                    <tr>
                        <td>FTP 扩展</td>
                        <td><?php if (extension_loaded('ftp')) {?> 
                            <span class="glyphicon glyphicon-ok success">
                            <?php } else { ?> 
                                <span class="glyphicon glyphicon-remove danger">
                            <?php } ?>
                        </td>
                        <td><span class="glyphicon glyphicon-ok success"></span></td>
                        <td>
                            <?php if (extension_loaded('ftp')) {?> 
                            <span class="glyphicon glyphicon-ok success">
                            <?php } else { ?> 
                                <span class="glyphicon glyphicon-remove danger">
                            <?php } ?>
                                </span></td>
                    </tr>
                    <tr>
                        <td>allow_url_fopen</td>
                        <td><?php if (ini_get('allow_url_fopen')) {
                            ?> 
                            <span class="glyphicon glyphicon-ok success">
                            <?php } else { ?> 
                                <span class="glyphicon glyphicon-remove danger">
                            <?php } ?>
                                
                        </td>
                        <td><span class="glyphicon glyphicon-ok success"></span></td>
                       <!--<td><?php ini_set('allow_url_fopen', 'Off'); ?></td> 无法正确执行 -->
                        <td><?php if (ini_get('allow_url_fopen')) { ?> 
                            <span class="glyphicon glyphicon-ok success">
                            <?php } else { ?> 
                                <span class="glyphicon glyphicon-remove danger">
                            <?php } ?>
                       </td>
                    </tr>
                    <tr>
                        <td>fsockopen</td>
                        <td><?php if (function_exists('fsockopen')) {?> 
                            <span class="glyphicon glyphicon-ok success">
                            <?php } else { ?> 
                                <span class="glyphicon glyphicon-remove danger">
                            <?php } ?>
                        </td>
                        <td><span class="glyphicon glyphicon-ok success"></span></td>
                        <td>
                            <?php if (function_exists('fsockopen')) {?> 
                            <span class="glyphicon glyphicon-ok success">
                            <?php } else { ?> 
                                <span class="glyphicon glyphicon-remove danger">
                            <?php } ?>
                        
                        </td>
                    </tr>
                    <tr>
                        <td>DNS解析</td>
                        <td><?php if (preg_match('/(\d{1,3}\.){3}\d{1,3}/', gethostbyname('www.hz5a.com'))) {?> 
                            <span class="glyphicon glyphicon-ok success">
                            <?php } else { ?> 
                                <span class="glyphicon glyphicon-remove danger">
                            <?php } ?>
                         </td>
                        <td><span class="glyphicon glyphicon-ok success"></span></td>
                        <td>
                            <?php if (preg_match('/(\d{1,3}\.){3}\d{1,3}/', gethostbyname('www.hz5a.com'))) {?> 
                            <span class="glyphicon glyphicon-ok success">
                            <?php } else { ?> 
                                建议正确解析DNS
                            <?php } ?>
                            
                      </td>
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
    <input type="hidden" name="step" value="3">
</form>
</body>
</html>