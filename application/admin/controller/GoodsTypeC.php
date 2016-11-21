<?php 
namespace app\admin\controller;
use think\Controller;
use app\admin\model\GoodsType;
/**
 * 商品类型
 */
class GoodsTypeC EXTENDS Controller{

	/**
	 * 添加商品分类页面初始化
	 * @return [type] [description]
	 */
	public function type_add_show(){

		$gt = new GoodsType();
		$res = $gt->get_all_goods_type();
		foreach($res as $k=>$v){
			$res[$k]['typeName']=str_repeat("|-----",$v['level']).$v['typeName'];
		}
		$this->assign('gt_list',$res);
		return $this->fetch('product-category-add');
	}

	/**
	 * 添加商品分类
	 */
	public function add_goods_type(){
		$parentId = $_POST['parentId'];
		$typeName = $_POST['typeName'];
		$typeInfo = $_POST['typeInfo'];
		$gt = new GoodsType();
		$res = $gt->add_goods_type($typeName,$typeInfo,$parentId);
		echo $res;
	}

}



 ?>