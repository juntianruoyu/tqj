<?php
/*
 * 求并集,以a为基准，把B中不在a的元素放入a中
 */
$a = array(1,2);
$b = array(2,1,2,2,3,4,5);
foreach($b as $value){
   if(!(in_array($value, $a))) {
       array_push($a, $value);
   }
}
print_r($a);
/*
 * 求交集，以a为基准，把不在b中的元素从a中删除
 */
$a = array(1,2,3);
$b = array(1);
foreach ($a as $key=> $value){
    if(!(in_array($value, $b))){
        unset($a[$key]);
    }
}
print_r($a);

?>