<?php 
namespace app\admin\model;
use think\Model;

/**
 * 商品类型
 */
class GoodsType EXTENDS Model{

	/**
	 * 获取所有商品分类
	 * @return [type] [description]
	 */
	public function get_all_goods_type(){

		$gt = Model('goods_type');
		$res = $gt->order('path','asc')->select();
		return $res;

	}

	/**
	 * 根据ID获取商品分类信息
	 * @param  [type] $typeId [description]
	 * @return [type]         [description]
	 */
	public function get_goods_type($typeId){

		$gt = Model('goods_type');
		$res = $gt->where('typeId='.$typeId)->find();
		return $res;

	}

	/**
	 * 添加商品分类
	 * @param [type] $typeName [description]
	 * @param [type] $typeInfo [description]
	 * @param [type] $parentId [description]
	 */
	public function add_goods_type($typeName,$typeInfo,$parentId){

		$gt = Model('goods_type');
		$gt->typeName = $typeName;
		$gt->typeInfo = $typeInfo;
		$gt->save();
		$typeId = $gt->typeId;
		$parent = $this->get_goods_type($parentId);
		if($parentId==0){
			$gt->path = "0,". $typeId;
		}else{
			$gt->path = $parent["path"] .",". $typeId;
		}
		$gt->parentId = $parentId;
		$gt->level = intval($parent["level"])+1;
		$res = $gt->save();
		return $res;

	}

}


 ?>