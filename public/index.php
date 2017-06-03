<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]

// 定义应用目录
define('APP_PATH', __DIR__ . '/../application/');
define('ROOT','/');
define('ADMIN_PATH', __DIR__ . '/../application/admin/');
define('__INDEX_VIEW__',    '../application/index/view/');
// 加载框架引导文件
if(!file_exists( __DIR__.'/install/install.lock')){
  
    //未安装则跳转至install目录下执行安装操作
    header("location:install/index.php?");
//     
    //跳转至install.php文件，而install.php文件绑定app中的install模块
   // header("location:install.php");
    exit();
}
require __DIR__ . '/../thinkphp/start.php';
