<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Member;

class Index EXTENDS Controller{

    public function index(){
        return $this -> fetch();
    }

    public function welcome(){

    	return $this -> fetch();
    }

    /**
     * 获取网站所有会员
     * @return [type] [description]
     */
    public function get_member_list(){
    	$m = new Member();
        var_dump($m);
    	$res = $m->get_member_list();
    	$this->assign('member_all_list',$res);
    	return $this->fetch('member-list');
    }

    /**
     * 通过会员ID，获取会员信息
     * @return [type] [description]
     */
    public function get_member(){
    	$memberId = $_GET['memberId'];
    	$m = new Member();
    	$res = $m->get_member($memberId);
    	$this->assign('member',$res);
    	return $this ->fetch('member-show');
    }

    /**
     * 显示会员信息修改界面
     * @return [type] [description]
     */
    public function edit_member_show(){
    	$memberId = $_GET['memberId'];
    	$m = new Member();
    	$res = $m->get_member($memberId);
    	$this->assign('member',$res);
    	return $this ->fetch('member-add');
    }

    /**
     * 修改会员信息
     * @return [type] [description]
     */
    public function update_member(){
    	$memberId = $_POST['memberId'];
    	$data = [
    		'memberName' => $_POST['memberName'],
    		'nickName' => $_POST['nickName'],
    		'password' => $_POST['password'],
    		'sex' => $_POST['sex'],
    		'phoneNumber' => $_POST['phoneNumber'],
    		'email' => $_POST['email'],
    		'introduction' => $_POST['introduction'],
    	];
    	$m = new Member();
    	$res = $m->update_member($data,$memberId);
        if($res){
            echo "1";
        }else{
            echo "2";
        }
    }

    /**
     * 修改密码界面显示
     * @return [type] [description]
     */
    public function modify_password_show(){
        $memberId = $_GET['memberId'];
        $m = new Member();
        $res = $m->get_member($memberId);
        $this->assign('member',$res);
        return $this ->fetch('change-password');
    }

    /**
     * 修改密码
     * @return [type] [description]
     */
    public function modify_password(){
        $memberId = $_POST['memberId'];
        $data = [
            'password' => $_POST['password'],
        ];
        $m = new Member();
        $res = $m->modify_password($data,$memberId);
        if($res){
            echo "1";
        }else{
            echo "2";
        }
    }

    public function delete_member(){
        $memberId = $_GET['memberId'];
        $m = new Member();
        $res = $m->delete_member($memberId);
        if($res){
            echo "1";
        }else{
            echo "2";
        }
    }

}
