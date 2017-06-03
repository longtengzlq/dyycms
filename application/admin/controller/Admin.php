<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\Model\Admin  as AdminModel;
use think\Db;
use think\Session;
//use app\admin\validate;
class Admin extends Base
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
         if(request()->isPost()){
             $creator='admin';
             if(Session('username')){
                    $creator=Session('username');
                }
             $status=0;
             if(input('status')=='on'){
                 $status=1;
             }
            
            $data=array(
                 'username'=>input("username"),
                 'create_time'=>time(),
                 'create_IP'=>$_SERVER["REMOTE_ADDR"],
                 'creator'=>$creator,                
                 'last_log_time'=>time(),
                 'last_log_IP'=>$_SERVER["REMOTE_ADDR"],                
                 'expiry_time'=> strtotime(input('expiry_time')),   
                 'status'=>$status,
             );
           /*
            $validate = \think\Loader::validate('Admin');
            if(!$validate->check($data)){
			   $this->error($validate->getError());
            }
            * */
             if(db('admin')->insert($data)){
                $this->success('添加成功', 'lst');  
             }else{
                  $this->error('添加失败');  
             }            
         }
        $auth_groups=db('auth_group')->order('id asc')->select();
        $this->assign("auth_groups", $auth_groups);
        return $this->fetch();
    }
    public function  lst(){
       $uid= Session::get('uid', 'mlcms_');
       $results=Db::name('admin')->where('id','neq','1')->paginate(10);
       $this->assign('uid',$uid);
       $this->assign('results',$results);
       $this->assign('language_id', get_language_id());
        return $this->fetch('list');
    }
    public  function edit(){
        $id=input('id');       
        $admins=db('admin')->find($id);
        if(request()->isPost()){
             $status=0;
             if(input('status')=='on'){
                 $status=1;
             }
            $data=[
                'id'=> input('id'),
    		'username'=>input("username"),                 
                 'last_log_time'=>time(),
                 'last_log_IP'=>$_SERVER["REMOTE_ADDR"],                
                 'expiry_time'=> strtotime(input('expiry_time')),   
                'status'=>$status,
                'email'=>input('email'),
                'QQ'=> input('QQ'),
                'address'=> input('address'),
                'telephone'=> input('telephone'),
            ];
            if(!input('password')){
                $data['password']=$admins['password'];               
            }else{
                 $data['password']= md5(input('password'));
            }
            /*
            $validate = \think\Loader::validate('Admin');
            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->getError());
            }
             * */
            
             if(db('admin')->where('id','eq',$data['id'])->update($data)){
                $this->success('修改管理员成功', 'lst');  
             }else{
                  $this->error('修改管理员失败');               } 
            
        }else{
            $user=db('admin')->where('id',$id)->find();
            $this->assign('user',$user);          
            return $this->fetch('edit');
        }
            
    }
    public  function del(){
        $id=input('id');
        if($id!=1){
            if(db('admin')->delete(array('id'=>$id)))
            {
                $this->success('操作成功');
            }else{
                $this->error('操作失败');
            }    
        }else{
            $this->error('超级管理员不能删除');
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
        if(db('admin')->update($data)!==false){            
                echo 'name'.input('field_name').'value'.input('field_value');
        }else{
            echo 'error';
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
                 if(db('admin')->update($value)!==false){
                    $is_success=true;
                 }elseif(db('admin')->update($value)===0){
                    $is_success=true;                   
                }else{
                    $is_success=FALSE;
                    $this->error(\think\Lang::get('operate_failure'), 'lst');    
                }
            }
             $this->success(\think\Lang::get('operate_success'), 'lst');    
            
        }
    }
    public  function delMuti(){
        
         $id_arr= input();
         dump(input());
         $language_id= get_language_id();
         $rst=TRUE;
         if(array_key_exists('checkbox',$id_arr)){             
             foreach ($id_arr['checkbox'] as $key => $value) {                 
                    if(Db::name('admin')->delete($value)){
                    } else {
                        $this->error(\think\Lang::get('operate_failure'), 'lst');    
                    };
            }
              $this->success(\think\Lang::get('operate_success'), 'lst');
         }else{
             $this->error(\think\Lang::get('no_selected_checkbox'), 'lst');
         }
    } 
}
