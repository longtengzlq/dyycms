<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
use think\Session;
use think\Cookie;
use think\Config;
use think\Request;

function get_current_url($request){
    return $request->url();
}
function get_language_id(){
     if (input('language_id')) {
        $language_id = input('language_id');
        Session::set('language_id', $language_id, 'mlcms_');
    } else {
        if (Session::has('language_id', 'mlcms_')) {
            $language_id = Session::get('language_id', 'mlcms_');
        } else {
            //最后应统一用一种表示当前网站语言，不要有site_type 和language_id两种方式，最好统一用languang_id
            $default_lang = Config::get('default_lang');
            switch ($default_lang) {
                case 'zh-cn':
                    Session::set('language_id', '1', ['prefix' => 'mlcms_']);
                    $language_id = 1;
                    break;
                case 'en-us':
                    Session::set('language_id', '2', ['prefix' => 'mlcms_']);
                    $language_id = 2;
                    break;
                default:
                    Session::set('language_id', '1', ['prefix' => 'mlcms_']);
                    $language_id = 1;
                    break;
            }
        }
    }
    return $language_id;
}
function set_language_id(){
    if (input('language_id')) {        
        Session::set('language_id', input('language_id'), 'mlcms_');
    }elseif(Session::has('language_id', 'mlcms_')){        
    }else{
        set_default_language_id();
    }
}
function upload_file(&$data_name,$field_name){
    $file = request()->file($field_name);
            if ($file) {
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads' . DS . 'images');
                if($info) {
                    $data_name[$field_name] = ROOT . 'uploads' . DS . 'images'. DS . $info->getSaveName();
                } else {
                    // 上传失败获取错误信息
                    echo $file->getError();
                }
            }
}
function set_default_language_id(){
            $language_id=0;
           $default_lang = Config::get('default_lang');
            switch ($default_lang) {
                case 'zh-cn':
                    Session::set('language_id', '1', 'mlcms_');
                    break;
                case 'en-us':
                    Session::set('language_id', '2','mlcms_');
                    break;
                default:
                    Session::set('language_id', '1','mlcms_');
                    $language_id = 1;
                    break;
            }
}

function check_auth(){
        $uid= Session::get('uid', 'mlcms_');
         $request = Request::instance();
         $auth=new app\admin\controller\Auth();
         $rule=$request->controller().'/'.$request->action();
         if($auth->check(strtolower($rule),$uid)){
             return TRUE;
         } else {
             return FALSE;
         }
}

/*失败
function sort_tree(&$datas,$pid,$level){
        static $sort_datas=array();
        static $key=0;
        static $level=0;
        if($pid=0){$level=0;}
        foreach ($datas as $key=> $data){
            if($data['pid']==$pid){
                $sort_rules[$key]=$data;
                $sort_rules[$key]['level']=$level;
                $key++;
                sort_tree($datas, $data['id'],$level);
            }
        }
        
        return $sort_datas;
   
}
 * 
 */

function sort_tree($datas, $pid=0, $level=0, $f_dataid='') {
        static $sort_datas = array();
        static $key = 0;
        $data_id = '';
        //改的
        foreach ($datas as $key => $data) {
            $dataid = $f_dataid;
            if ($data['pid'] == $pid) {
                $sort_datas[$key] = $data;
                $sort_datas[$key]['level'] = $level;
                if ($pid == 0) {
                    $dataid = $data['id'];
                } else {
                    $dataid .= '-' . $data['id'];
                }
                $sort_datas[$key]['dataid'] = $dataid;
                $key++;
               sort_tree($datas, $data['id'], $level + 1, $dataid);
            }
        }
        return $sort_datas;
    }
    
    function get_position($id,$type=1){
        //type为1时表示文章传递的参数，为2时表示栏目列表

       $cates=array();
        if($type==1){
            $cate=db('article')->find($id);            
            $cates=get_parent($cate['category_id']);
        } else {
            $cates= get_parent(intval($id));
        }
       if(krsort($cates)){
           return $cates;
       }else{
           return false;
       }
           
    }
    
  
    function get_parent($id){
        static $arr=array();
        static $k=0;
        $sortcate='';
        $cate=db('category')->find($id);
       
        $arr[$k]=$cate;
        if($cate['pid']!=0){
            $k++;
            
            return get_parent($cate['pid']);
            
        }else{   
            
           return $arr;
        }
        //return $arr;
        
    }
    
    function get_childs_id($id,$cate){
        static $ids=array();
        static $k=0;
        $ids[$k]=intval($id);
        foreach ($cate as $key=>$value){            
            if($value['pid']==$id){
                $k++;
                get_childs_id($value['id'],$cate);
            }else{
            }
        }
        return $ids;
    }