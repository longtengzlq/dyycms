<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\Model\AuthGroupAccess  as AuthGroupAccessModel;
use think\Db;
use think\Session;
//use app\admin\validate;
class AuthGroupAccess extends Base
{
   
   
     public function add()
    {
         if(request()->isPost()){
            $data=array(
                 'title'=>input("title"),
                'rules'=>'1',
                 
             );
             if(array_key_exists('status', input())){
                 $data['status']=1;
             }else{
                 $data['status']=0;
             }
           /*
            $validate = \think\Loader::validate('Admin');
            if(!$validate->check($data)){
			   $this->error($validate->getError());
            }
            * */
             if(db('auth_group')->insert($data)){
                $this->success('添加成功', 'lst');  
             }else{
                  $this->error('添加失败');  
             }            
         }
        return $this->fetch();
    }
    public function  lst(){
        $uid=0;
        if(Session::has('uid','mlcms_')){
            $uid= session('uid','mlcms_');
        }
        $this->assign("uid",$uid);
       $language_id= get_language_id();
       $results=Db::name('admin')->paginate(10);      
       $this->assign('results',$results);
       $this->assign('language_id',$language_id);
        return $this->fetch('list');
    }
    public  function edit(){
        $id=input('id');       
        $admin=db('admin')->find($id);
        if(request()->isPost()){
            $status=0;
            if(input('status')=='on'){
                 $status=1;
             }
             
            if(array_key_exists('checkbox', input())){
                db('auth_group_access')->where('uid',$id)->delete();
                $access_data=[ ];
                $check_arr=$_POST['checkbox'];
              
                  foreach ($check_arr as $key => $value){
                    $tmp_data['uid']=$id;
                    $tmp_data['group_id']=$value;
                    array_push($access_data, $tmp_data);
                }
                if(db('auth_group_access')->insertAll($access_data)){
                    $this->success('修改用户权限信息成功',url('lst'));
                } else {
                    $this->error('修改用户权限信息失败',url('lst'));
                }
                /*
                 * 用in_array加以甄别元素是否在表中，然后采取措施，不如全部删除，重新插入来的好
              $temps=db('auth_group_access')->select();
                foreach($access_data as $key=>$value){
                    if(in_array($value, $temps) ){  
                        dump($value);
                    } else {
                         db('auth_group_access')->insert($value);
                    }
                }
                 */
            }   
        }else{
            $auth_groups=db('auth_group')->order('id asc')->select();
            $auth_group_ids='';
            $group_ids=db('auth_group_access')->where('uid',$id)->field('group_id')->select();
            foreach ($group_ids as $key=>$value){
                if($key==0){
                    $auth_group_ids.=$value['group_id'];
                }else{
                    $auth_group_ids.=','.$value['group_id'];
                }
                
            }
            $this->assign("group_ids", $auth_group_ids);
            $this->assign("auth_groups", $auth_groups);            
            $this->assign('admin',$admin);          
            return $this->fetch('edit');
        }
            
    }
    public  function del(){
        $id=input('id');
        if($id!=1){
            if(db('auth_group')->delete($id))
            {
                $this->success('操作成功');
            }else{
                $this->error('操作失败');
            }    
        }else{
            $this->error('超级管理员组不能删除');
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
        if(db('auth_group')->update($data)!==false){            
                echo 'name'.input('field_name').'value'.input('field_value');
        }else{
            echo 'error';
        }
    }
    /*
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
                 if(db('auth_group')->update($value)!==false){
                    $is_success=true;
                 }elseif(db('auth_group')->update($value)===0){
                    $is_success=true;                   
                }else{
                    $is_success=FALSE;
                    $this->error(\think\Lang::get('operate_failure'), 'lst');    
                }
            }
             $this->success(\think\Lang::get('operate_success'), 'lst');    
            
        }
    }
     * 
     */
    public  function delMuti(){
        
         $id_arr= input();
         $language_id= get_language_id();
         $rst=TRUE;
         if(array_key_exists('checkbox',$id_arr)){             
             foreach ($id_arr['checkbox'] as $key => $value) {                 
                    if(Db::name('auth_group')->delete($value)){
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
