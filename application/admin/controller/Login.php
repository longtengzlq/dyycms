<?php
// +----------------------------------------------------------------------
// | MLCMS [ DO AN WELL THING ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017-2020 http://www.dyycms.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: ZLQ <6693113@163.com>
// +----------------------------------------------------------------------

namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;
use think\Session;
use think\Validate;
use think\Loader;
use think\Config;
use think\Lang;
use think\Cookie;
use app\admin\validate\User;
class Login  extends Controller
{
    /*
    function  _initialize(){    
        $lang = '';      
        $default_lang = Config::get('default_lang');
        if (input('lang')) {
            $lang = input('lang');
        } elseif (Cookie::has('lang','mlcms_')) {
            $lang = Cookie::get('lang','mlcms_');
        } else {
            $lang = $default_lang;
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
    }
     * 
     */
   
    public function index()
    {
        return $this->fetch();
    }
    public function login(){
        //检测用户曾经登陆过，则不用登录 直接跳转后台
        //利用Cookie可以避免用户输入用户名密码而直接登录网站，但是用在后台则不合适，登陆后台还是用Session的好，因为退出登录后就销毁了，带有安全性
        /*
        if(Cookie::has('username','mlcms_')){
            $this->redirect('index/index');
        }
         * 
         */
        //判断服务器段是否存在Session,若存在，则用户已经登录过，不用重复登录，否则显示登陆界面
        if(Session::has('username','mlcms_')){
            $this->redirect('index/index');
        }elseif(request()->isPost()){
            //获取用户登陆数据
            $data=input();
            //设置网站语言ID,目前是系统默认语言，通过应用配置文件config.php读取
            set_language_id();
            //验证码操作
            /*
            if(!captcha_check(input('captcha'))){
                  $this->error(\think\Lang::get('验证码错误'), url('login/login'));          
            };
             * 
             */
             $user=array();
            if($data['username']!=''&&$data['password']!=''){
                $user['username']=$data['username'];
                $user['password']=md5($data['password']);
            }
            //定义了用户输入的用户名密码的验证规则和错误信息，详见admin/validate/User.php 千万不要相信用户的输入，所以所有的表单都要验证
            $validate = Loader::validate('User');            
            if($validate->check($user)===TRUE){                
            }else{
                //验证失败则输出错误信息，并跳转至lgin页面
                return $this->error( $validate->getError());
            }
            $result= Db::name('admin')->where($user)->find();
            if($result){
                Session::set('username',$data['username'],'mlcms_');                
                Session::set('uid',$result['id'],'mlcms_');
                Cookie::set('username', $data['username'], ['prefix'=>'mlcms_','expire'=>3600]);
                Cookie::set('uid', $result['id'], ['prefix'=>'mlcms_','expire'=>3600]);
                $log_data['last_log_time']=time();
                $log_data['id']=$result['id'];                
                db('admin')->update($log_data);
                $this->success(\think\Lang::get('login_success'), url('admin/index',['id'=>Cookie::get('uid', 'mlcms_')]));
            }else{
                return $this->fetch();
            }
            
        } else {
             $request = Request::instance();
            $current_action = $request->controller() . '/' . $request->action();
            $this->assign("current_action", $current_action);
            return $this->fetch();
        }
        
    }
    public function logout()
    {
        Session::clear('mlcms_');
        return $this->success(\think\Lang::get('logout_success'),'login/login');
    }
    
}
