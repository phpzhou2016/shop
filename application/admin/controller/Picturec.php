<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/20 0020
 * Time: 下午 10:23
 */

namespace app\admin\controller;
use think\Controller;
use app\admin\model\PictureM;
class Picturec EXTENDS Controller{

    public function pic_list(){



        $path = dirname(dirname(dirname(__dir__)));
        $path= $path."\\public\\upload\\goods\\images\\";
        $pic =new PictureM();
        $pic-> getfiles($path);


    }




}