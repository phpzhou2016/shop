<?php 
namespace app\admin\controller;
use think\Controller;
use app\admin\model\State;

/**
 * 商品状态
 */
class StateC EXTENDS Controller{

	public function index(){

		$st = new State();
		$res = $st->get_all_state();
		$this->assign('state_list',$res);
		$this->assign('stateLength',count($res));
		return $this->fetch('state-list');

	}

	public function add_state_show(){
		return $this->fetch('state-add');
	}

	public function add_state(){
		$data = [
			'stateName' => $_POST['stateName'],
			'stateInfo' => $_POST['stateInfo'],
		];
		$st = new State();
		$res = $st->add_state($data);
		echo $res;
	}

	public function edit_state_show(){
		$id = $_GET['stateId'];
		$st = new State();
		$res = $st->get_state($id);
		$this->assign('state',$res);
		return $this->fetch('state-edit');
	}

	public function edit_state(){
		$id = $_POST['stateId'];
		$data = [
			'stateName' => $_POST['stateName'],
			'stateInfo' => $_POST['stateInfo'],
		];
		$g = new State();
		$res = $g->edit_state($data,$id);
		if($res){
			echo "1";
		}else{
			echo "0";
		}
	}

	

	public function delete_state(){

		$id = $_GET['stateId'];
		$g = new State();
		$res = $g->delete_state($id);
		if($res){
			echo "1";
		}else{
			echo "0";
		}
		
	}

}

?>