<?php
namespace app\admin\controller;
use think\Controller;
use think\Lang;
use think\Session;
use think\Cookie;
use think\Request;
use think\Config;
use think\Url;
class  Base extends Controller
{
    function  _initialize(){  
        //设置网站语言，并加载相应语言文件
        $lang = '';      
        $default_lang=Config::get('default_lang');
        if (input('lang')) {
            $lang = input('lang');
        } elseif (Cookie::has('lang','mlcms_')) {
            $lang = Cookie::get('lang','mlcms_');
        } else {
            $lang =  $default_lang;
        }
        switch ($lang) {
            case 'zh-cn':
                Lang::load(ADMIN_PATH . 'lang/zh-cn.php');
                Cookie::set('lang','zh-cn',['prefix'=>'mlcms_','expire'=>3600]);                
                break;
            case 'en-us':
                Lang::load(ADMIN_PATH . 'lang/en-us.php');
                Cookie::set('lang','en-us',['prefix'=>'mlcms_','expire'=>3600]);    
                break;
            default:
                Lang::load(ADMIN_PATH . 'lang/' . $default_lang . '.php');
                Cookie::set('lang',$default_lang,['prefix'=>'mlcms_','expire'=>3600]);
                break;
        }
       
        $request= Request::instance();
        $current_action=$request->controller().'/'.$request->action();
        $this->assign("current_action", $current_action);
        //检查用户是否登陆，否则登陆
        $this->checkLogin();
         //获取操作的控制器名称和方法名称并作为权限规则验证的参数传入，
        //如果验证通过则继续，否则跳转到admin/index解码
        //if(check_auth()){            
       // }else{
           // $this->error('您没有权限',url('index/index'));
        //}
    }

    protected function  checkLogin(){
        //    原来用Session实现安全行较高
        if(!Session::has('username','mlcms_')){
            $this->error(\think\Lang::get('not_login'), url('login/login'));
        }else{
            $this->assign('login_username', Session::get('username','mlcms_'));            
        }
         
        //现在用Cookie实现，好处是减少服务器压力,一般用作客户中心，作为网站后台用Session比较安全
        /*
         if(!Cookie::has('username','mlcms_')){
            $this->error(\think\Lang::get('not_login'), url('login/login'));
        }else{
            $this->assign('login_username', Cookie::get('username','mlcms_'));            
        }* 
         */
    }


}
