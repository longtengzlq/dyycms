<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\en\controller;
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
        $cates=db('category')->field('id,cate_name,pid,type')->where(array('status'=>1,'language_id'=>2,'pid'=>0))->select();
        $hot_arts= Article::name('article')->where(array('language_id'=>'2','status'=>1))->where('thumb', 'neq', '')->order('zan desc')->limit(5)->select();
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
