<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\Model\Links  as LinksModel;
use think\Db;
use think\Session;
//use app\admin\validate;
class Links extends Base
{
   
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
         set_language_id();
         $language_id= get_language_id();
         if(request()->isPOST()){
             $data['is_recommond']=0;
             $data= input();
             if(input('is_recommond')=='on'){
                $data['is_recommond']=1;
             }
             $file = request()->file('thumb');
            if ($file) {
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads' . DS . 'images');
                if($info) {
                    $data['thumb'] = ROOT . 'uploads' . DS . 'images'. DS . $info->getSaveName();
                    $data['is_thumb']=1;
                } else {
                    // 上传失败获取错误信息
                    echo $file->getError();
                }
            }


            if(Db::name('links')->insert($data)){
                 $this->success(\think\Lang::get('operate_success'),url('lst',array('language_id'=>$language_id)));
             }{
                 $this->success(\think\Lang::get('operate_failure'),url('lst',array('language_id'=>$language_id)));
             }
             
         }
         $lang= Db::name('language')->select();
         $this->assign("lang", $lang);            
         $this->assign("language_id", $language_id);              
         return $this->fetch();
    }
    public function  lst(){
        set_language_id();
        $language_id= intval(get_language_id());
        
        $this->assign("language_id",$language_id);
       $results=LinksModel::name('links')->where('language_id','eq',$language_id)->paginate(10);
       $this->assign('results',$results);
        return $this->fetch('list');
    }
    public  function edit(){
       $id=input('id');
       
        $language_id= intval(get_language_id());
        $this->assign("language_id",$language_id);
       if(request()->isPost()){
            $data['is_recommond']=0;
             $data= input();
             
             if(input('is_recommond')=='on'){
                $data['is_recommond']=1;
             }             
             upload_file($data,'thumb');
             if(array_key_exists('thumb', $data)){
                 $data['is_thumb']=1;
             };
             if(Db::name('links')->where('id',$id)->update($data)!==false){
                $this->success(\think\Lang::get('operate_success'),url('lst',array('language_id'=>$language_id)));
             }else{
                $this->success(\think\Lang::get('operate_failure'),url('lst',array('language_id'=>$language_id)));
             }
        }
       $lang= Db::name('language')->select();
       $this->assign("lang", $lang);
       
       $result= LinksModel::name('links')->where(['id'=>$id])->find();
       $this->assign('result',$result);
       return $this->fetch('edit');
            
    }
    public  function del(){
        $id=input('id');       
        $language_id= get_language_id();
        echo $language_id;
        if(db('links')->delete(array('id'=>$id)))
        {
            $this->success(\think\Lang::get('operate_success'), url('links/lst',array('language_id'=>input('language_id'))));
        }else{
            $this->success(\think\Lang::get('operate_failure'), url('links/lst',array('language_id'=>input('language_id'))));
        }    
    } 
     public  function delMuti(){
         $id_arr= input();
         $language_id= get_language_id();
         if(array_key_exists('checkbox',$id_arr)){             
             foreach ($id_arr['checkbox'] as $key => $value) {                 
                    if(Db::name('links')->delete($value)){
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
                 if(db('links')->update($value)!==false){
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
        if(db('links')->update($data)!==false){            
                echo 'name'.input('field_name').'value'.input('field_value');
        }else{
            echo 'error';
        }
    }
}
