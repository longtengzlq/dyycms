<?php
namespace app\admin\model;
use think\Model;
class Category extends Model {

    function language(){
        return $this->belongsTo('language','language_id','id','','LEFT');
    }
}
