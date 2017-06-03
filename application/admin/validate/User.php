<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author ZLQ
 */
namespace app\admin\validate;
use think\Validate;
class User extends Validate {
    
    protected $rule = [
        'username' => 'require|length:4,25',
        'password' => 'require|length:4,32',
    ];
    protected $message = [
        'username.require' => '必须填写用户名',
        'username.max' => '用户名不能少于4个字符且最多不超过25个字符',
        'password.require' => '必须填写用户名',
        'password.max' => '密码不能少于4个字符且最多不超过32个字符',
    ];

}
