<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\Model\AuthGroup  as AuthGroupModel;
use think\Db;
use think\Session;
//use app\admin\validate;
class AuthGroup extends Base
{
   
   
     public function add()
    {
        $rules=db('auth_rule')->order('sort asc')->select();
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
             if(array_key_exists('rules', input())){
               //  $data['rules']=input('rules');
              //此处只能为$_POST
              $rules=$_POST['rules'];
              $data['rules']='';
              foreach ($rules as $key => $value) {
                  if($key==0){
                      $data['rules'].=$value; 
                  }else{
                      $data['rules'].=','.$value; 
                  }                 
              }              
             }else{
                  $this->error('请选择权限');  
             }
             $auth=db('auth_rule')->select();
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
         $sort_rules= $this->sort_tree($rules,0,0,''); 
         $this->assign("sort_rules",$sort_rules);
        return $this->fetch();
    }
    public function  lst(){
  
       $results=Db::name('auth_group')->paginate(10);      
       $this->assign('results',$results);
       $this->assign('language_id', '1');
        return $this->fetch('list');
    }
    public  function edit(){
        $rules=db('auth_rule')->order('sort asc')->select();
        $sort_rules= $this->sort_tree($rules,0,0,''); 
        $this->assign("sort_rules",$sort_rules);
        $id=input('id');       
        $result=db('auth_group')->find($id);
        if(request()->isPost()){
             $status=0;
             if(input('status')=='on'){
                 $status=1;
             }
            $data=[
                'id'=> input('id'),
    		'title'=>input("title"),                 
               
                'status'=>$status,
            ];
             if(array_key_exists('rules', input())){
               //  $data['rules']=input('rules');
              //此处只能为$_POST
              $rules=$_POST['rules'];
              $data['rules']='';
              foreach ($rules as $key => $value) {
                    if ($key == 0) {
                        $data['rules'] .= $value;
                    } else {
                        $data['rules'] .= ',' . $value;
                    }
                }
            } else {
                 $data['rules'] = '';
               
                // $this->error('确认不分配任何权限?');  
            }
            /*
            $validate = \think\Loader::validate('Admin');
            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->getError());
            }
             * */
          
             if(db('auth_group')->update($data)!==false){
                $this->success('修改用户组成功', 'lst');  
             }else{
                  $this->error('修改用户组失败');               } 
            
        }else{            
            $this->assign('result',$result);
            $rules_arr= explode(',', $result['rules']);          
            $this->assign('rules_arr',$rules_arr);
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
    protected function sort_tree($datas, $pid, $level, $f_dataid) {
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
                $this->sort_tree($datas, $data['id'], $level + 1, $dataid);
            }
        }

        /* 原来程序，有点小问题
          static $dataid='';

          foreach ($datas as $key=> $data){
          if($data['pid']==$pid){
          $sort_datas[$key]=$data;
          $sort_datas[$key]['level']=$level;
          if($pid==0){
          $dataid=$data['id'];
          }else{
          $dataid.='-'.$data['id'];
          }
          $sort_datas[$key]['dataid']=$dataid;
          $key++;
          $this->sort_tree($datas, $data['id'], $level+1);
          }
          }
         * 
         */

        return $sort_datas;
    }

}
