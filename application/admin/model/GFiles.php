<?php
/**
 * @Author: anchen
 * @Date:   2018-05-19 13:04:10
 * @Last Modified by:   anchen
 * @Last Modified time: 2018-05-19 13:05:42
 */
namespace app\admin\model;
use think\Model;
use think\db;

class GFiles extends Model
{
    //连接的表名
    protected $table = 'goods_files';

    //主键名
    protected $pk = 'id';
}