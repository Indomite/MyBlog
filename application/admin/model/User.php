<?php
namespace app\admin\model;

use think\Db;
use think\Model;

class User extends Model{
    public function getByusername($username)
    {
        return $this->where('username',  $username)->find();
    }
}
