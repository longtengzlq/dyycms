<?php
namespace app\admin\model;
use think\Model;
class Article extends Model {

    function language(){
        return $this->belongsTo('language','language_id','id','','LEFT');
    }
    function category(){
        return $this->belongsTo('category','category_id','id','','LEFT');
    }
}
