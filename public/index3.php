<?php 

require '../thinkphp/base.php';
use think\Request;
use think\Db;
use think\Config;

 $db_dsn = "mysql://root:root@127.0.0.1:3306/admin#utf8";
 $db = Db::connect($db_dsn);
 $sqlstr = file_get_contents('mlcms.sql');;
$second_str=$sqlstr;
$sql_arr=sql_str_handle($second_str);

foreach ($sql_arr as $key => $value) {
    try {
        $result = $db->execute($value);
        
    } catch (Exception $exc) {
        echo $key.'===============>';
        echo $exc->getTraceAsString();
    }

    
   
        echo '<br/>';
        echo '<br/>';
        echo '<br/>';
        echo '<br/>';
        echo '<br/>';
}








function sql_str_handle($str){
    $sql_arr=array();
    $second_str=$str;
    $k=0;
    while (strlen($second_str) > 0) {
        $next_create_pos = strpos($second_str, 'CREATE TABLE', 1);
        $next_insert_pos = strpos($second_str, 'INSERT INTO', 1);
        $next_alert_pos = strpos($second_str, 'ALTER TABLE', 1);
        $next_drop_pos = strpos($second_str, 'DROP TABLE', 1);               
           
        if ($next_create_pos !== false && $next_insert_pos !== false) {
            $min_cre_ins_value = ($next_create_pos > $next_insert_pos) ? $next_insert_pos : $next_create_pos;            
        } elseif ($next_create_pos !== false && $next_insert_pos === false) {            
            $min_cre_ins_value = $next_create_pos;
        } elseif ($next_create_pos === false && $next_insert_pos !== false) {
            $min_cre_ins_value = $next_insert_pos;
        } else {
           $min_cre_ins_value=false;
        }
        if ($next_alert_pos!==false&& $next_drop_pos!==false) {
            $min_ale_drop_value = ($next_alert_pos > $next_drop_pos) ? $next_drop_pos : $next_alert_pos;            
        } elseif ($next_alert_pos !== false && $next_drop_pos === false) {            
            $min_ale_drop_value = $next_alert_pos;
        } elseif ($next_alert_pos === false && $next_drop_pos !== false) {
            $min_ale_drop_value = $next_drop_pos;
        } else {
           $min_ale_drop_value=false;
        }
        if ($min_cre_ins_value!==false&& $min_ale_drop_value!==false) {
             $min_value=($min_cre_ins_value>$min_ale_drop_value)?$min_ale_drop_value:$min_cre_ins_value;            
        } elseif ($min_cre_ins_value !== false && $min_ale_drop_value === false) {            
            $min_value = $min_cre_ins_value;
        } elseif ($min_cre_ins_value === false && $min_ale_drop_value !== false) {
            $min_value = $min_ale_drop_value;
        } else {
           $min_value=false;
           break;;
        }
        $first_str=substr($second_str,0,$min_value);
        $str_tmp= substr($first_str,0, strrpos($first_str, ';')+1);
        /*
        echo '<br/>';
        echo '<br/>';
        echo $k.'===================>'.$str_tmp;
        
        
        
        echo '<br/>';
        echo '<br/>';
        
         * 
         */
        $sql_arr[$k]=$str_tmp;
        $second_str=substr($second_str,$min_value,strlen($second_str)-$min_value);
        $k++;       
    }
    $sql_arr[$k]=$second_str;
  /*
    echo $k.'===================>'.$second_str;
      echo '<br/>';
        echo '<br/>';
    print_r($sql_arr);
   * 
   */

return $sql_arr;
    
    
}
?>