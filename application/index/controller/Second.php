<?php
namespace app\index\controller;
use app\index\controller\Base;
use think\Request;
class Second extends Base
{
    public function index()
    {
       
        return $this->fetch();
    }
    public function lst(){
       
        return $this->fetch('');
    }
}
