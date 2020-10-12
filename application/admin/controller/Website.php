<?php
namespace app\admin\controller;
use think\Controller;

class Website extends Controller{
    
    public function _initialize(){
        $renderData = [
            "id" => session('id'), //登入状态
            "username" => session('username'),
        ];

        $this->assign($renderData);
    }
    
    public function index(){
        $copyright = $_POST['copyright'];
        $contart = $_POST['contart'];
        $number = $_POST['number'];
        $links = $_POST['links'];

        $data = [
            'copyright' => ($copyright),
            'contart' => ($contart),
            'number' => ($number),
            'links' => ($links),
        ];

        $result = $newWebdata->save();

        return view();
    }
}