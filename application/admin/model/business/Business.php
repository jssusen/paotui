<?php

namespace app\admin\model\business;

use think\Model;
use traits\model\SoftDelete;

class Business extends Model
{

    use SoftDelete;

    

    // 表名
    protected $name = 'business';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';
    protected $deleteTime = 'deletetime';

    // 追加属性
    protected $append = [
        'service_time_text',
        'status_text',
        'type_text'
    ];

    public function school(){
        return $this->belongsTo('\app\admin\model\university\School','school_id',"id")->field("school.id,order_school.name")->setEagerlyType(0);
    }
    
    public function getStatusList()
    {
        return ['0' => __('Status 0'), '1' => __('Status 1'), '2' => __('Status 2'), '3' => __('Status 3'), '4' => __('Status 4')];
    }

    public function getTypeList()
    {
        return ['0' => __('Type 0'), '1' => __('Type 1'), '2' => __('Type 2'), '3' => __('Type 3'), '4' => __('Type 4'), '5' => __('Type 5'), '6' => __('Type 6'), '7' => __('Type 7')];
    }


    public function getServiceTimeTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['service_time']) ? $data['service_time'] : '');
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }


    public function getStatusTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['status']) ? $data['status'] : '');
        $list = $this->getStatusList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getTypeTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['type']) ? $data['type'] : '');
        $list = $this->getTypeList();
        return isset($list[$value]) ? $list[$value] : '';
    }

    protected function setServiceTimeAttr($value)
    {
        return $value === '' ? null : ($value && !is_numeric($value) ? strtotime($value) : $value);
    }


}
