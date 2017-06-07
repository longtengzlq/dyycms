<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\ModelType  as ModelTypeModel;
use think\Db;
use think\Session;
//use app\admin\validate;
class ModelType extends Base
{
    function _initialize() {
        parent::_initialize();
        if(is_dir('./template/model_type')){
             $cate_file=array();
             $list_file=array();
             $detail_file=array();
             $files= scandir('./template/model_type');
             $cat_str='/^category.*/';
             $list_str='/^list.*/';
             $detail_str='/^detail.*/';
             $cate_file= preg_grep($cat_str, $files);
             $list_file= preg_grep($list_str, $files);
             $detail_file= preg_grep($detail_str, $files);
             $this->assign('cate_file',$cate_file);
             $this->assign('list_file',$list_file);
             $this->assign('detail_file',$detail_file);
         }
    }

    public function index()
    {
        return $this->fetch();
    }
    public function logout()
    {
        Session::clear();
        return $this->success('注销成功','login/index');
    }
     public function add()
    {    
         
         
         if(request()->isPOST()){
            $data=input();


            if(Db::name('model_type')->insert($data)){
                 $this->success(\think\Lang::get('operate_success'),url('lst'));
             }{
                 $this->success(\think\Lang::get('operate_failure'),url('lst'));
             }
             
         }else{
             return $this->fetch();
         }
           
         
    }
    public function  lst(){
       
       $results=Db::name('model_type')->paginate(10);
       $this->assign('results',$results);
        return $this->fetch('list');
    }
    public  function edit(){
       $id=input('id');
       if(request()->isPost()){
            $data=input();
             if(Db::name('model_type')->where('id',$id)->update($data)!==false){
                $this->success(\think\Lang::get('operate_success'),url('lst'));
             }else{
                $this->success(\think\Lang::get('operate_failure'),url('lst'));
             }
        }
       
       $result= ModelTypeModel::name('model_type')->where(['id'=>$id])->find();
       $this->assign('result',$result);
       return $this->fetch('edit');
            
    }
    public  function del(){
        $id=input('id');       
        if(db('model_type')->delete(array('id'=>$id)))
        {
            $this->success(\think\Lang::get('operate_success'), url('model_type/lst'));
        }else{
            $this->success(\think\Lang::get('operate_failure'), url('model_type/lst'));
        }    
    } 
     public  function delMuti(){
         $id_arr= input();
         $language_id= get_language_id();
         if(array_key_exists('checkbox',$id_arr)){             
             foreach ($id_arr['checkbox'] as $key => $value) {                 
                    if(Db::name('model_type')->delete($value)){
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
                 if(db('model_type')->update($value)!==false){
                 }else{
                    $this->error(\think\Lang::get('operate_failure'), 'lst');    
                }
            }
             $this->success(\think\Lang::get('operate_success'), 'lst');    
            
        }
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
        if(db('model_type')->update($data)!==false){            
                echo 'name'.input('field_name').'value'.input('field_value');
        }else{
            echo 'error';
        }
    }
}
