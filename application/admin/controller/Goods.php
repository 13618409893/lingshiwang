<?php
/**
 * @Author: anchen
 * @Date:   2018-05-04 07:08:06
 * @Last Modified by:   anchen
 * @Last Modified time: 2018-05-05 17:19:43
 */
namespace app\admin\controller;
use think\Controller;
use app\admin\model;
use think\db;
class Goods extends Controller
{
    //分类展示界面
    public function product_category(){

        return  $this->fetch();
    }


    //获取分类数据
    public function product_category_ajax(){
        $m = Model('Goods');
        $data = $m->field('id,parent_id,name')->select();
        echo json_encode($data);
    }

    //删除分类信息
    public function product_category_del(){

    }


    public function product_category_add(){
        $m = model('Goods');
        $data=$m->order('concat(path,",",id)')->select();
        //var_dump($data);

        foreach($data as $k=>$v){
            $data[$k]['name']=str_repeat("|------", $v['level']).$v['name'];
        }

        $this->assign('data',$data);
        return  $this->fetch();
    }

    //添加分类信息到数据库
    public function goods_type_add(){
        //从前端页面获取数据
        $data['name'] = $_POST['name'];
        $data['parent_id'] = $_POST['parent_id'];
        //实例化模型
        $m = Model('Goods');

        //判断是否为二级分类
        if($data['name'] !=" " && $data['parent_id']!=0){

        //查询出path路径
        $path=$m->field("path")->find($data['parent_id']);
        $data['path']=$path['path'];
        //将等级的计算按照逗号的个数来划分
        $data['level']=substr_count($data['path'],",");
        $re=$m->insertGetId($data);//返回插入id


        $path['id']=$re;
        //组合成path路径
        $path['path']=$data['path'].','.$re;
        $path['level']=substr_count($path['path'],",");

        //var_dump($path);
        //通过更新的方式来防止主键和其他的字段重新加入数据库中
        $res=$m->update(['id'=>$re,'name'=>$data['name'],'parent_id'=>$data['parent_id'],'path'=>$path['path'],'level'=>$path['level']]);
            if($res){

              return   $this->success("添加成功","product_category_add",2);
            }else{
              return   $this->error("添加失败","product_category_add",2);
            }
        //判断是否为一级分类
        }else if($data['name'] !="" && $data['parent_id'] ==0){

                //$path=$m->field("path")->find($data['pid']);
                $data['path']=$data['parent_id'];
                $data['level']=1;
                $re=$m->insertGetId($data);//返回插入id
                //echo $re;
                $path['id']=$re;
                $path['path']=$data['path'].','.$re;

                $res=$m->update(['id'=>$re,'name'=>$data['name'],'parent_id'=>$data['parent_id'],'path'=>$path['path'],'level'=>$data['level']]);

                if($res){

                  return   $this->success("添加成功","product_category_add","",2);
                }else{
                  return   $this->error("添加失败","product_category_add","",2);
                }

            }else{
               return   $this->error("添加失败,内容不能为空","product_category_add","",2);

            }
    }

    //商品列表分类页
    public function product_list(){

       return  $this->fetch();
    }

     //添加商品页
    public function product_add(){

        return  $this->fetch();
    }

     //添加商品到数据库

    public function product_add_goods(){


    }
      //添加商品图片数据库
    public function prduct_add_goods_ajax(){

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



    }

    //商品图片删除
    public function product_del_images(){

    }



}