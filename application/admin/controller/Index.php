<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\Model\Admin  as AdminModel;
use think\Db;
use think\Request;
use think\Lang;
use think\Cookie;
use think\Session;
use think\Config;
//use app\admin\validate;
class Index extends Base
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
             //dump(input());die;
             $data=array(
                 'name'=>input("username"),
                 'password'=>input('password'),
                 'regtime'=>time(),
                 'last_login_time'=>time(),
                 'last_login_IP'=>$_SERVER["REMOTE_ADDR"],
                 'reg_IP'=>$_SERVER["REMOTE_ADDR"]
             );
           
            $validate = \think\Loader::validate('Admin');
            if(!$validate->check($data)){
			   $this->error($validate->getError());
            }
             if(db('admin')->insert($data)){
                $this->success('添加成功', 'lst');  
             }else{
                  $this->error('添加失败');  
             }             
         }
        return $this->fetch();
    }
    public function  lst(){
        $results=Db::name('admin')->paginate(10);
        $this->assign('results',$results);
        return $this->fetch('list');
    }
    public  function edit(){
        $id=input('id');       
        $admins=db('admin')->find($id);
        if(request()->isPost()){
            $data=[
                'id'=> input('id'),
    		'name'=>input('name'),
    		'password'=>input('password'),
            ];
            if(!input('password')){
                $data['password']=$admins['password'];               
            }else{
                 $data['password']= md5(input('password'));
            }
            $validate = \think\Loader::validate('Admin');
            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->getError());
            }
             if(db('admin')->update($data)){
                $this->success('修改管理员成功', 'lst');  
             }else{
                  $this->error('修改管理员失败');               } 
            
        }else{
            
            $this->assign('user',$admins);
          
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
}
