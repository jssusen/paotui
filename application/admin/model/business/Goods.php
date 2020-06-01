<?php

namespace app\admin\model\business;

use think\Model;
use traits\model\SoftDelete;

class Goods extends Model
{

    use SoftDelete;

    

    // 表名
    protected $name = 'goods';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';
    protected $deleteTime = 'deletetime';

    // 追加属性
    protected $append = [

    ];
    

    
    public  function GoodsCategory()
    {
        return $this->belongsToMany("\app\admin\model\business\GoodsCategory","\app\admin\model\business\GoodsAndCategory","category_id","goods_id");
    }







}
