<?php
/**
 * @Author: anchen
 * @Date:   2018-05-07 17:27:43
 * @Last Modified by:   anchen
 * @Last Modified time: 2018-05-07 17:28:52
 */
namespace app\admin\model;
use think\Model;
use think\db;

class Category extends Model
{

    //连接的表名
    protected $table = 'chihuo_category';

    //主键名
    protected $pk = 'id';
}
