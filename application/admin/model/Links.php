<?php
namespace app\admin\model;
use think\Model;
use think\Db;
class Links extends Model {
  
    function language(){
        return $this->belongsTo('language','language_id','id','','LEFT');
    }
}
