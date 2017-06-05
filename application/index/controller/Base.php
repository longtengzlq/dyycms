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
        parent::_initialize();
        try {
            $cates=db('category')->field('id,cate_name,pid,type')->where(array('status'=>1,'language_id'=>1,'pid'=>0))->select();
        } catch (Exception $exc) {
            $this->error('请先安装系统', 'install/index.php');
        }

        
        $hot_arts= Article::name('article')->where(array('language_id'=>'1','status'=>1))->where('thumb', 'neq', '')->order('zan desc')->limit(5)->select();
         $this->assign('hot_arts',$hot_arts);
        //对顶级栏目进行排序增加其子元素
        $this->sortCates($cates);        
        //dump($cates);
        $this->assign('sort_cates',$cates);
       
    }
    protected function sortCates(&$cates){
        foreach ($cates as $key => $cate) {
            $children=db('category')->where('pid',$cate['id'] )->select();
            if(count($children)!=0){
                $cates[$key]['children']=$children;            
            }else{
                $cates[$key]['children']=0;        
            }
        }
        
    }
}
