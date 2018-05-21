<?php
/**
 * @Author: anchen
 * @Date:   2018-05-04 07:08:06
 * @Last Modified by:   anchen
 * @Last Modified time: 2018-05-20 14:47:16
 */
namespace app\admin\controller;
use think\Controller;
use app\admin\model;
use DB;
use org\Upload;

class Goods extends Controller
{


    //商品列表分类页
    public function product_list(){
        $m=model('Goods');
        $es="";
        //如果传过来的ID不为空，那么tid就为传过来的ID
        if(!empty($_GET['id'])){
            $es="tid={$_GET['id']}";
        }

        $data=$m->where($es)->select();
        $this->assign('data',$data);
        return  $this->fetch();
    }

     //添加商品的页面
    public function product_add(){
        $m=model('Category');
        $data=$m->order('concat(path,",",id)')->select();
        foreach($data as $k=>$v){
            $data[$k]['name']=str_repeat("|------",$v['level']).$v['name'];
        }

        $this->assign('data',$data);
        return  $this->fetch();
    }

    //添加商品到数据库
    public function product_add_goods(){
        //var_dump($_POST);
        $m=model('Goods');

        $data['goodsname']=$_POST['goodsname'];
        $str=explode(",",$_POST['tid']);
        $data['tid']=$str[0];
        $data['tpid']=$str[1];

        $data['unit']=$_POST['unit'];
        $data['attributes']=$_POST['attributes'];
        //拼接图片
        //$data['imagepath']=implode(',', $_POST['imagepath']);

        $data['number']=$_POST['number'];
        $data['curprice']=$_POST['curprice'];
        $data['oriprice']=$_POST['oriprice'];
        //$data['cosprice']=$_POST['cosprice'];
        $data['inventory']=$_POST['inventory'];
        $data['restrict']=$_POST['restrict'];
        $data['already']=$_POST['already'];
        $data['freight']=$_POST['freight'];
        $data['status']=$_POST['status'];
        $data['reorder']=$_POST['reorder'];
        //$data['text']=$_POST['editorValue'];


        if($m->insert($data)){

          return   $this->success("添加成功","product_list","",2);
        }else{
          return   $this->error("添加失败","product_list","",2);
        }
    }

    //添加商品图片数据库
    public function prduct_add_goods_ajax(){
        var_dump($_FILES);
        echo 1;
    }


    //编辑商品
    public function product_edit(){

    }

    public function product_edit_save(){


    }


    //删除商品
    public function product_edit_delete(){

    }


    //商品图片上传
    public function product_add_images(){

        $upload = new \org\Upload();
        $upload->maxSize = 3145728;
        $upload->exts = array('jpg','gif','png','jpeg');
        $upload->rootPath = './static/files/';
        $upload->saveName=time().rand(111,999);
        $date=date("Y-m-d",time());
        $upload->saveExt="png";
        $info = $upload->upload();
        if(!$info){
            $this->error($upload->getError);
        }else{
            $m=model('GFiles');
            $data['filepath']='/static/files/'.$date."/".$upload->saveName.".".$upload->saveExt;
            echo json_encode($file);
        }

    }

    //商品图片删除
    public function product_del_images(){

    }



}