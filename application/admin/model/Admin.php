<?php
namespace app\admin\model;
use think\Model;
use think\Db;
class Admin extends Model {
    //put your code here
  //  protected $tableName  = 'blog_admin';
  //  protected  $autoCheckFields=false;
    public function roles() {
       // return $this->belongsToMany('AuthGroup','auth_group_access','id','group_id');
    }

    public function login($data=null){
      if($data!=NULL){
          $admin=db('admin')->where('name','=',$data['username'])->find();
          if($admin){
              if(md5($data["password"])==$admin['password']){
                  session('username', $data['username']);
                  session('uid',$admin['id']);
                  return 3;//信息正确
              }else{
                  return 2; //密码错误
              }
          }else{
              return 1;//用户名不存在
            }
        }
    }
}
