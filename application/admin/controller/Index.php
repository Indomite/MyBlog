<?php
namespace app\admin\controller;
use think\Controller;

class Index extends Controller{
    public function index(){
        $username = session('username');
        $id = session('id');
        $userInfo = model('User')->get($id);
        // var_dump($userInfo);
        return view();
    }
}