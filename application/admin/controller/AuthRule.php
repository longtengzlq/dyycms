<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\Model\AuthRules  as AuthRulesModel;
use think\Db;
use think\Session;
//use app\admin\validate;
class AuthRule extends Base
{
   
   
     public function add()
    {
        $rules=db('auth_rule')->order('sort asc')->select();      
        $sort_rules= $this->sort($rules,0);
         if(request()->isPost()){
            $data=input();
             if(array_key_exists('status', input())){
                 $data['status']=1;
             }else{
                 $data['status']=0;
             }
              if(array_key_exists('type', input())){
                 $data['type']=1;
             }else{
                 $data['type']=0;
             }
            
           /*
            $validate = \think\Loader::validate('Admin');
            if(!$validate->check($data)){
			   $this->error($validate->getError());
            }
            * */ 
             if(input('pid')==0){
                 $data['level']=0;                 
             }else{
                 $p_rule=db('auth_rule')->find(input('pid'));
                 $data['level']=$p_rule['level']+1;
             }
             if(db('auth_rule')->insert($data)){
                $this->success('添加成功', 'lst');  
             }else{
                  $this->error('添加失败');  
             }           
         }
         $this->assign('sort_rules',$sort_rules);
        return $this->fetch();
    }
    public function  lst(){
  
       $results=Db::name('auth_rule')->select();
      $sort_result= sort_tree($results,0,0,'');
      // $this->assign('sort_rules',$sort_result);
       $this->assign('results',$sort_result);
       $this->assign('language_id', '1');
       return $this->fetch('list');
    }
    public  function edit(){
        $id=input('id');       
        $result=db('auth_rule')->find($id);
        $rules=db('auth_rule')->order('sort asc')->select();
        $sort_rules= $this->sort($rules,0);
        if(request()->isPost()){     
            $data=input();
             if(array_key_exists('status', $data)){
                 $data['status']=1;
             }else{
                 $data['status']=0;
             }
             if(array_key_exists('type', $data)){
                 $data['type']=1;
             }else{
                 $data['type']=0;
             }
             $pid=$data['pid'];
            $temp=db('auth_rule')->field('level')->find($pid);
              $data['level']=$temp['level']+1;
            /*
            $validate = \think\Loader::validate('Admin');
            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->getError());
            }
             * */
          
             if(db('auth_rule')->update($data)!==false){
                $this->success('修改规则成功', 'lst');  
             }else{
                  $this->error('修改规则失败');              
            } 
            
        }else{            
            $this->assign('result',$result);          
            $this->assign('sort_rules',$sort_rules);          
            return $this->fetch('edit');
        }
            
    }
    public  function del(){
        $id=input('id');
        if($id!=1){
            if(db('auth_rule')->delete($id))
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
        if(db('auth_rule')->update($data)!==false){            
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
                 if(db('auth_rule')->update($value)!==false){
                    $is_success=true;
                 }elseif(db('auth_rule')->update($value)===0){
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
                    if(Db::name('auth_rule')->delete($value)){
                    } else {
                        $this->error(\think\Lang::get('operate_failure'), 'lst');    
                    };
            }
              $this->success(\think\Lang::get('operate_success'), 'lst');
         }else{
             $this->error(\think\Lang::get('no_selected_checkbox'), 'lst');
         }
    } 
    protected function sort($rules,$pid)    {        
        static $sort_rules=array();
        static $key=0;
        foreach ($rules as $rule){
            if($rule['pid']==$pid){
                $sort_rules[$key]=$rule;
                $key++;
                $this->sort($rules, $rule['id']);
            }
        }
        
        return $sort_rules;
    }
}
