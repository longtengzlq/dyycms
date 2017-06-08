<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\index\controller;
use think\Controller;
use app\admin\model\Article;
use think\Request;

/**
 * Description of Base
 *
 * @author ZLQ
 */
class Base  extends Controller{
    function _initialize() {
        //取出栏目信息，所有前台页面均需用到故放到Base类中去除
        try {
            $system= db('setting')->where(array('language_id'=>'1'))->find();
           
           
        } catch (\Exception $exc) {
            if(file_exists('/install/install.lock')){
               // unlink('install/install.lock');
            }
            $this->error('请先安装系统，或确认数据库配置正确', '/install/index.php');
        }
        $request = Request::instance();
        if ($system['site_switch'] == 0 && $request->action() != 'building') {

            $this->redirect('building');
            //定义全局变量，通知所有程序站点关闭，将来所有控制器均要检查站点是否关闭，没有关闭，才开始工作
            define('SITE_SWITCH', 'OFF');
        }
        $cates = db('category')->field('id,cate_name,pid,type,model_type_id')->where(array('status' => 1, 'language_id' => 1, 'pid' => 0))->select();

        //热门文章推荐
        $hot_arts= Article::name('article')->where(array('language_id'=>'1','status'=>1))->where('thumb', 'neq', '')->order('zan desc')->limit(5)->select();

        $this->assign('system',$system);
         $this->assign('hot_arts',$hot_arts);
        //对顶级栏目进行排序增加其子元素
        $this->sortCates($cates);        
        //dump($cates);
        $this->assign('sort_cates',$cates);
        parent::_initialize();
       
    }
    protected function sortCates(&$cates){
        foreach ($cates as $key => $cate) {
            //这里是个性能瓶颈，多次去数据库中取数据，可以利用两层foreach实现
            $children=db('category')->where('pid',$cate['id'] )->select();
            if(count($children)!=0){
                $cates[$key]['children']=$children;            
            }else{
                $cates[$key]['children']=0;        
            }
        }
        
    }
}
