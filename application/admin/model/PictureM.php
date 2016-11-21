<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/20 0020
 * Time: 下午 10:36
 */

namespace app\admin\model;
use think\Model;


class PictureM EXTENDS Model{


    public function getfiles($path){
        if(!is_dir($path)) return;
        $handle  = opendir($path);

        $files = array();
        while(false !== ($file = readdir($handle))){
            if($file != '.' && $file!='..'){
                $path2= $path.$file;

                if(is_dir($path2)){
                    $this->$this->getfiles($path2);
                }else{
                    if(preg_match("/\.(gif|jpeg|jpg|png|bmp)$/i", $file)){
                        $files[] = $path.$file;

                    }
                }
            }
        }
        print_r($files);
        return $files;


    }




}