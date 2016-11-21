<?php
namespace app\index\controller;
use think\Controller;
class Index EXTENDS Controller{
	
    public function index(){
        return $this -> fetch();
    }
    
}
