<?php
/**
 * @Author: anchen
 * @Date:   2018-05-04 13:52:58
 * @Last Modified by:   anchen
 * @Last Modified time: 2018-05-07 19:31:14
 */
namespace app\admin\model;
use think\Model;
use think\db;

class Goods extends Model
{
    //连接的表名
    protected $table = 'chihuo_goods';

    //主键名
    protected $pk = 'id';
}