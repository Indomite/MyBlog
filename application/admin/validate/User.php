<?php
namespace app\admin\validate;

use think\Validate;

class User extends Validate
{
    protected $rule = [
        'name' => 'require|min:5',
        'email' => 'email',
        'password' => 'require|min:6',
    ];
}
