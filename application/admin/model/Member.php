<?php 
namespace app\admin\model;
use think\Model;

/**
 * 会员
 */
class Member EXTENDS Model{
	
	/**
	 * 获取全部会员信息
	 * @return [type] [description]
	 */
	public function get_member_list(){

		$m = Model('member');
		$res = $m->order('memberId','asc')->select();
		return $res;

	}

	/**
	 * 通过ID获取会员信息
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function get_member($id){

		$m = Model('member');
		$res = $m->where('memberId='.$id)->find();
		return $res;

	}


	/**
	 * 更新会员信息
	 * @param  [type] $data [description]
	 * @param  [type] $id   [description]
	 * @return [type]       [description]
	 */
	public function update_member($data,$id){

		$m = Model('member');
		$res = $m->update($data,['memberId' => $id]);
		return $res;

	}

	/**
	 * 修改密码
	 * @param  [type] $data [description]
	 * @param  [type] $id   [description]
	 * @return [type]       [description]
	 */
	public function modify_password($data,$id){

		$m = Model('member');
		$res = $m->update($data,['memberId' => $id]);
		return $res;

	}

	/**
	 * 根据ID删除用户信息
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function delete_member($id){

		$m = Model('member');
		$res = $m->where('memberId='.$id)->delete();
		return $res;

	}


}


?>