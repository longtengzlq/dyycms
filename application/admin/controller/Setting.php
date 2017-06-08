<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\Model\Admin  as AdminModel;
use think\Db;
use think\Request;
use think\Lang;
use think\Session;
//use app\admin\validate;
class Setting extends Base
{  
    public function index()
    {          
        
        if(request()->isPost()){
            $data=array();
            $data['site_switch']=0;
            $data['GD_test']=0;
            $data['GD_test_switch']=0;
            foreach (input() as $k=>$v){                
                $data[$k]=$v;               
                if($k=='site_switch'||$k=='GD_test'||$k=='GD_test_switch'){
                    $data[$k]=1;
                }
            }
            if(db('setting')->update($data)){
                $this->success('操作成功', 'edit');
            }else{
                $this->error('操作失败', 'edit');
            }
            
        }else{
          return $this->fetch('edit');  
        }        
    }
     public function edit()
    {  
         //权限验证，如果不通过则跳转
         $auth = new Auth();
        if ($auth->check('Setting/edit', Session::get('uid', 'mlcms_'))) {
            
        } else {
            $this->error('你没有权限','index/index');
        }


         $or_data = '';
         set_language_id();
         $language_id= get_language_id();
         $or_data= db('setting')->where(array('language_id'=>$language_id))->find();  
         
         $data['language_id']=$or_data['language_id'];
        if (request()->isPost()) {
            $data = array();
            $data['site_switch'] = 0;
            $data['GD_test'] = 0;
            $data['GD_test_switch'] = 0;
            foreach (input() as $k => $v) {
                if ($k == 'site_switch' || $k == 'GD_test' || $k == 'GD_test_switch') {
                    $data[$k] = 1;
                } else {
                    if ($v != '') {
                        $data[$k] = $v;
                    }
                }
            }

            if (db('setting')->update($data)!==false) {
                $this->success('操作成功', 'edit');
            } else {
                $this->error('操作失败', 'edit');
            }
        } else {
            $this->assign('or_data', $or_data);
            return $this->fetch();  
        }   
    }
    public function  add(){
        
          if(request()->isPost()){
            $data=array();
            $data['site_switch']=0;
            $data['GD_test']=0;
            $data['GD_test_switch']=0;
            foreach (input() as $k=>$v){
                if($v!=''){
                    $data[$k]=$v;
                }             
                if($k=='site_switch'||$k=='GD_test'||$k=='GD_test_switch'){
                    $data[$k]=1;
                }
            }
            db('setting')->insert($data);
            
        }else{
          return $this->fetch();  
        }        
    }
  
}
