<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Session;
use think\Request;
use think\Loader;
use app\admin\model\Article as ArticleModel;
use app\admin\validate;
class Article extends Base
{
    function _initialize() {       
        parent::_initialize(); 
        $language_id= get_language_id();
                
        $lang= db('language')->select(); 
        $lang_arr='';
        if($lang){
            foreach ($lang as $key => $value) {
            $lang_arr[$value['id']]=$value;
            }
        }
        unset($lang);   
        $this->assign('lang',$lang_arr);
        $this->assign('language_id',$language_id);
        $cates=db('category')->where(array('language_id'=>$language_id))->order('sort asc')->select();
        $cat_arr='';                
        if($cates){
            foreach ($cates as $key => $value) {
            $cat_arr[$value['id']]=$value;
            }
        }
        $this->assign('cates',$cat_arr);  
        $sort_cates=$this->sort($cates,0,0);
        unset($cates); 
        $this->assign('sort_cates',$sort_cates);

        /*
        $arts=db('article')->where(array('language_id'=>$language_id))->order('sort asc')->select();
        $art_arr='';                
        if($arts){
            foreach ($arts as $key => $value) {
            $art_arr[$value['id']]=$value;
            }
        }
        $this->assign('arts',$art_arr);  
        $sort_arts=$this->sort($arts,0,0);
        unset($arts); 

        $this->assign('sort_arts',$sort_arts); 
         * 
         */
        
    }


    public function index()
    {
        return $this->fetch();
    }
    
     public function add()
    {   
         $language_id= get_language_id();
         if(request()->isPost()){
             $data['status']=0;
             $data['is_recommend']=0;
             $data['can_comment']=0;
            $data=input();
            if(input('status')=='on'){
                $data['status']=1;
            }
            if(input('is_recommend')=='on'){
                $data['is_recommend']=1;
            }
             if(input('can_comment')=='on'){
                $data['can_comment']=1;
            }
            if(input('release_date')==''){
                $data['release_date']=time();
            }else{
                $data['release_date']= strtotime($data['release_date']);
            }
            $data['create_date']=time();
            
            $data['language_id']= intval(input('language_id'));
            //Session Username
            $data['editor']= Session::get('username','mlcms_');
            if(array_key_exists('content', $_POST)){
                $data['content']= $_POST['content'];
            }else{
                $data['content']= '';
            }
             
            
             $file = request()->file('thumb');
            if ($file) {
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads' . DS . 'images');
                if($info) {
                    $data['thumb'] = ROOT . 'uploads' . DS . 'images'. DS . $info->getSaveName();
                } else {
                    // 上传失败获取错误信息
                    echo $file->getError();
                }
            }
            
            if(db('article')->insert($data)){
                $this->success('操作成功', url('lst'));
            } else {
                $this->error('操作失败', url('lst'));
            }
            
         }else{
            $this->assign('language_id',$language_id);
            return $this->fetch();
         }
       
    }
    public function  lst(){
        set_language_id(input('language_id'));
        
        $language_id= get_language_id();  
        $str='';
        if($language_id==1){
            $str='ch';
        } else {
            $str='en';
        }
        $uid= Session::get('uid','mlcms_');
         $auth=new Auth();
        if($auth->check('article/lst,'.$str,$uid,1,'url','and')){
        }else{
           // $this->error('您没有权限', url('index/index')); 
        }
        $result= ArticleModel::where(array('language_id'=>$language_id))->order('sort asc,id desc')->paginate(10);   
        $this->assign('results',$result);
        $this->assign('language_id', $language_id);
        return $this->fetch('list');
    }
    public  function edit(){
        $id=input('id');
        $language_id= get_language_id();
        $cates=db('category')->where(array('language_id'=>$language_id))->order('sort asc')->select();  
        $sort_cates=$this->sort($cates,0,0);
        unset($cates); 
        $this->assign('sort_cates',$sort_cates);
        if(request()->isPost()){
            $data['status']=0;
             $data['is_recommend']=0;
             $data['can_comment']=0;
            $data=input();
            if(input('status')=='on'){
                $data['status']=1;
            }
            if(input('is_recommend')=='on'){
                $data['is_recommend']=1;
            }
             if(input('can_comment')=='on'){
                $data['can_comment']=1;
            }
            if(input('release_date')==''){
                $data['release_date']=time();
            }else{
                $data['release_date']= strtotime($data['release_date']);
            }
            $data['create_date']=time();
            $data['language_id']= intval(input('language_id'));
            //Session Username
            $data['editor']="ZLQ";
            if(array_key_exists('content', $_POST)){
                $data['content']= $_POST['content'];
            }else{
                $data['content']= '';
            }
            
             $file = request()->file('thumb');
            if ($file) {
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads' . DS . 'images');
                if($info) {
                    $data['thumb'] = ROOT . 'uploads' . DS . 'images'. DS . $info->getSaveName();
                } else {
                    // 上传失败获取错误信息
                    echo $file->getError();
                }
            }

            if(db('article')->update($data)){
                 $this->success(\think\Lang::get('operate_success'), url('article/lst',array('language_id'=>input('language_id'))));
            }else{
                 $this->error(\think\Lang::get('operate_failure'), url('article/lst',array('language_id'=>input('language_id'))));
            }
        }
        
        $this->assign("language_id", $language_id);
        $this->assign("id", $id);
        $result= ArticleModel::where(array('id'=>$id))->find();
        $this->assign('results',$result);
         return $this->fetch();
            
    }
    public  function del(){
        $id=input('id');       
         
        if(db('article')->delete(array('id'=>$id)))
        {
            $this->success(\think\Lang::get('operate_success'), url('article/lst',array('language_id'=>input('language_id'))));
        }else{
            $this->success(\think\Lang::get('operate_failure'), url('article/lst',array('language_id'=>input('language_id'))));
        }    
    } 
     public  function delMuti(){
         $id_arr= input();

         $language_id= get_language_id();
         $rst=TRUE;
         if(array_key_exists('checkbox',$id_arr)){             
             foreach ($id_arr['checkbox'] as $key => $value) {                 
                    if(Db::name('article')->delete($value)){
                    } else {
                        $this->error(\think\Lang::get('operate_failure'), 'lst');    
                    };
            }
              $this->success(\think\Lang::get('operate_success'), 'lst');
         }else{
             $this->error(\think\Lang::get('no_selected_checkbox'), 'lst');
         }
    } 
     public  function resort(){
        $sort_arr= input();
        dump($sort_arr);
        $language_id= get_language_id();
        if(array_key_exists('sort',$sort_arr)){
            $datas='';
            foreach ($sort_arr['sort'] as $key => $value) {
                static $k=0;
                $datas[$k]['sort']=$value;
                $datas[$k]['id']=$key;               
                $k++;
            }

            foreach ($datas as $key => $value) {
                 if(db('article')->update($value)){
                    $is_success=true;
                 }elseif(db('article')->update($value)===0){
                    $is_success=true;                   
                }else{
                    $is_success=FALSE;
                    $this->error(\think\Lang::get('operate_failure'), 'lst');    
                }
            }
             $this->success(\think\Lang::get('operate_success'), 'lst');    
            
        }
    }
    public  function test(){
        $language_id= get_language_id();

        $data=db('category')->where(array('language_id'=>$language_id))->select();
        $this->assign("cate", $data);
         return $this->fetch();
    }
   
     public  function test_sort(){
        $language_id= get_language_id();
       
        $data=db('category')->where(array('language_id'=>$language_id))->select();
        
        $sort_data=$this->sort($data,0,0);
        
        $this->assign("cate", $data);
        $this->assign('sort_data',$sort_data);
         return $this->fetch();
    }
    /*
    protected function  sort($datas,$pid, $level){
        static $arr='';
        static $k=0;
        foreach ($datas as $key => $value) {
            if($value['pid']==$pid){
                $arr[$k]=$value;
                $arr[$k]['level']=$level;
                $k++;
                $this->sort($datas, $value['id'], $level+1);
            }
        }
        return $arr;
    }
     * 
    protected function  getChilds($datas,$pid){
        static $arr='';
        static $k=0;
        foreach ($datas as $key => $value) {
            if($value['pid']==$pid){
                $arr[$k]=$value['id'];
                $k++;
                $this->getChilds($datas, $value['id']);
            }
        }
        return $arr;
    }
     * 
     */
     protected function  sort($datas,$pid, $level){
        static $arr='';
        static $k=0;
        foreach ($datas as $key => $value) {
            if($value['pid']==$pid){
                $arr[$k]=$value;
                $arr[$k]['level']=$level;
                $k++;
                $this->sort($datas, $value['id'], $level+1);
            }
        }
        return $arr;
    }
    public function  updateStatus(){
       $data['id']= input('id');          
       if(input('field_name')&&(input('field_value')!==false)){
           $field_name=input('field_name');
            $field_value=input('field_value');
            $data[$field_name]=$field_value;
       }else{
          echo 'error';
       }
        if(db('article')->update($data)!==false){            
                echo 'name'.input('field_name').'value'.input('field_value');
        }else{
            echo 'error';
        }
    }
}
