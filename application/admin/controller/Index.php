<?php
/**
 * @Author: anchen
 * @Date:   2018-05-04 07:04:31
 * @Last Modified by:   anchen
 * @Last Modified time: 2018-05-20 19:34:53
 */
namespace app\admin\controller;
use think\Controller;

class Index extends Controller
{
    public function index(){
        return $this->fetch();
    }

    public function welcome(){

        return $this->fetch();
    }

    public function product_category(){

        return $this->fetch();
    }


    public function product_category_add(){

        return $this->fetch();
    }
}