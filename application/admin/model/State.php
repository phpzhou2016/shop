<?php 
namespace app\admin\model;
use think\Model;

/**
 * 状态
 */
class State EXTENDS Model{

	public function get_all_state(){

		$state = Model('state');

		$res = $state->order('stateId','asc')->select();
		return $res;

	}

	public function get_state($id){

		$state = Model('state');
		$res = $state->where('stateId = '.$id)->find();
		return $res;

	}

	public function add_state($data){

		$state = Model('state');
		$res = $state->data($data)->save();
		return $res;

	}

	public function edit_state($data,$id){

		$state = Model('state');
		$res = $state->update($data,['stateId' => $id]);
		return $res;

	}

	public function delete_state($id){

		$state = Model('state');
		if(strstr($id,",")){
			$idArry = explode(",",$id);
			$newIdArry = Array();
			for($i = 0;$i<count($idArry);$i++){
				if($i>0){
					Array_push($newIdArry,$idArry[$i]);
				}
			}
			$ids = join(',',$newIdArry);
			$res = $state->where('stateId in (' . $ids .')')->delete();
			return $res;
		}else{
			$res = $state->where('stateId = ' . $id )->delete();
			return $res;
		}
		
	}
}



?>