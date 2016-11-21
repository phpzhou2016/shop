<?php 
namespace app\admin\controller;
use think\Controller;
use app\admin\model\GoodsType;
use app\admin\model\Goods;
use app\admin\model\State;
use think\File;
class GoodsC EXTENDS Controller{

	/**
	 * 商品列表初始化
	 * @return [type] [description]
	 */
	public function index(){
		$g = new Goods();
		$res = $g->get_all_goods();
		$this->assign('goods_list',$res);
		return $this->fetch('product-list');
	}

	/**
	 * 商品添加界面初始化
	 * @return [type] [description]
	 */
	public function goods_add_show(){
		$gt = new GoodsType();
		$gt_list = $gt->get_all_goods_type();
		foreach($gt_list as $k=>$v){
			$gt_list[$k]['typeName']=str_repeat("|-----",$v['level']).$v['typeName'];
		}

		$st = new State();
		$st_list = $st->get_all_state();

		$this->assign('gt_list',$gt_list);
		$this->assign('st_list',$st_list);
		return $this->fetch('product-add');
	}

	/**
	 * 添加商品
	 */
	public function add_goods(){
		$data = [
			'goodsName' => $_POST['goodsName'],
			'goodsTypeId' => $_POST['goodsTypeId'],
			'goodsSize' => $_POST['goodsSize'],
			'goodsColor' => $_POST['goodsColor'],
			'goodsPrice' => $_POST['goodsPrice'],
			'goodsCloth' => $_POST['goodsCloth'],
			'stateId' => $_POST['stateId'],
			'goodsSales' => $_POST['goodsSales'],
			'goodsAddTime' => $_POST['goodsAddTime'],
			'goodsAbstract' => $_POST['goodsAbstract'],
			'goodsInfo' => $_POST['editorValue'],
			'goodsPicture' => $_POST['goodsImages'],
		];
		//$path = Config::get("upload_path");
		//$file = new File();
		//$file->move()
		$g = new Goods();
		$res = $g->add_goods($data);
		echo $res;

	}

	/**
	 * 修改商品信息界面初始化
	 * @return [type] [description]
	 */
	public function edit_goods_show(){

		$id = $_GET['goodsId'];
		$g = new Goods();
		$res = $g->get_goods($id);
		$this->assign('goods',$res);
		$gt = new GoodsType();
		$gt_list = $gt->get_all_goods_type();
		foreach($gt_list as $k=>$v){
			$gt_list[$k]['typeName']=str_repeat("|-----",$v['level']).$v['typeName'];
		}
		$st = new State();
		$st_list = $st->get_all_state();
		$this->assign('st_list',$st_list);
		$this->assign('gt_list',$gt_list);
		return $this->fetch('product-edit');

	}

	/**
	 * 修改商品信息
	 * @return [type] [description]
	 */
	public function edit_goods(){
		$id = $_POST['goodsId'];
		$data = [
			'goodsName' => $_POST['goodsName'],
			'goodsTypeId' => $_POST['goodsTypeId'],
			'goodsSize' => $_POST['goodsSize'],
			'goodsColor' => $_POST['goodsColor'],
			'goodsPrice' => $_POST['goodsPrice'],
			'goodsCloth' => $_POST['goodsCloth'],
			'goodsSales' => $_POST['goodsSales'],
			'stateId' => $_POST['stateId'],
			'goodsAddTime' => $_POST['goodsAddTime'],
			'goodsAbstract' => $_POST['goodsAbstract'],
			'goodsInfo' => $_POST['editorValue'],
		];
		$g = new Goods();
		$res = $g->edit_goods($data,$id);
		if($res){
			echo "1";
		}else{
			echo "0";
		}
	}

	/**
	 * 删除商品信息
	 * @return [type] [description]
	 */
	public function delete_goods(){

		$id = $_GET['goodsId'];
		$g = new Goods();
		$res = $g->delete_goods($id);
		if($res){
			echo "1";
		}else{
			echo "0";
		}
		
	}

	public function qwer(){

		//获取文件名称
		$name = $_REQUEST['name'];
		//上传目录（这里是临时目录）
		$upload_path = TEMP_PATH;
		//要上传的文件
		$file = $_FILES['goodsImages']['tmp_name'];
		//上传操作
	    move_uploaded_file($file,$upload_path.$name);

	}

}




 ?>