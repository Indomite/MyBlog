<?php
namespace app\admin\controller;

use app\admin\Model\User as UserModel;
use think\Controller;

class User extends Controller{

    //初始化方法
    public function _initialize()
    {
        $renderData = [
            "id" => session('id'), //登入状态
            "username" => session('username'),
        ];
        $this->assign($renderData);
    }

    public function login(){
        return view();
    }

    public function checkReister(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        //验证数据
        $validateData = [
            'name' => $username,
            'password' => $password,
        ];
        // var_dump($validateData);

        $result = $this->validate($validateData, "User");
        // var_dump($result);
        if ($result !== true) {
            $this->error($result, 'admin/user/register');
        }

        $data = [
            'username' => ($username),
            'password' => md5(($password)),
            'email' => $email,
            'status' => 1,
            'register_time' => time(),
            'last_login_time' => time(),
        ];

        $newUser = new UserModel($data);
        $result = $newUser->save();

        if ($result) {
            $this->success('添加用户成功', 'admin/index/index');
        } else {
            $this->error('添加用户失败', 'admin/user/sign');
        }
    }

    public function checkLogin(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        // 验证数据
        $validateData = [
            'name' => $username,
            'password' => $password,
        ];
        $result = $this->validate($validateData, "User");
        if ($result !== true) {
            $this->error($result, 'admin/user/login');
        }else{
            $user = model('User')->getByusername($username);
            if($user){
                if($user->password == md5($password)){
                    session('username', $username);
                    session('id', $user->id);
                    $this->success('登录成功','admin/index/index');
                }else{
                    $this->error('密码错误','admin/user/login');
                }
            }
        }
    }

    public function Useradd(){
        return view();
    }

    public function Userlist(){
        return view();
    }
}
?>