<?php
/**
 * @Author: anchen
 * @Date:   2018-05-04 13:52:58
 * @Last Modified by:   anchen
 * @Last Modified time: 2018-05-05 16:33:41
 */
namespace app\admin\model;
use think\Model;
use think\db;

class Goods extends Model
{
    //连接的表名
    protected $table = 'chihuo_category';

    //主键名
    protected $pk = 'id';
}