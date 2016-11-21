<?php 
namespace app\admin\model;
use think\Model;

/**
 * 商品类
 */
Class Goods extends Model{
	
	/**
	 * 获取所有商品的信息
	 * @return [type] [description]
	 */
	public function get_all_goods(){

		$goods = Model('goods');

		$res = $goods->order('goodsId','asc')->select();
		return $res;

	}

	/**
	 * 根据ID获取商品信息
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function get_goods($id){

		$goods = Model('goods');
		$res = $goods->where('goodsId = '.$id)->find();
		return $res;

	}

	/**
	 * 添加商品
	 * @param [type] $data [description]
	 */
	public function add_goods($data){

		$goods = Model('goods');
		$res = $goods->data($data)->save();
		return $res;

	}


	/**
	 * 修改商品信息
	 * @param  [type] $data [description]
	 * @param  [type] $id   [description]
	 * @return [type]       [description]
	 */
	public function edit_goods($data,$id){

		$goods = Model('goods');
		$res = $goods->update($data,['goodsId' => $id]);
		return $res;

	}

	/**
	 * 根据ID删除商品信息
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function delete_goods($id){

		$goods = Model('goods');
		if(strstr($id,",")){
			$idArry = explode(",",$id);
			$newIdArry = Array();
			for($i = 0;$i<count($idArry);$i++){
				if($i>0){
					Array_push($newIdArry,$idArry[$i]);
				}
			}
			$ids = join(',',$newIdArry);
			$res = $goods->where('goodsId in (' . $ids .')')->delete();
			return $res;
		}else{
			$res = $goods->where('goodsId = ' . $id )->delete();
			return $res;
		}
	}

}


 ?>