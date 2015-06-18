<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 1先计算长度 2 确定冒泡次数，例如10个数只冒九次跑就行了 3 确定每一次冒泡比较次数 4 交换值是固定的模式
 */
function maopao($arr){//向上冒泡
    $len = count($arr);
    for($i=0;$i<$len-1;$i++){
        $flag = 0;
        for($j=0;$j<$len-1-$i;$j++){
            if($arr[$j]<$arr[$j+1]){
                $m=$arr[$j];
                $arr[$j] = $arr[$j+1];
                $arr[$j+1] =$m;
               
                $flag = 1;
            }
            
        }
     if($flag == 0) break;   
    }
    return $arr;
}
function maopao_1($arr){
    $len = count($arr);
    for($i=0;$i<$len-1;$i++){
        for($j=$len-1;$j>$i;$j--){
            if($arr[$j]<$arr[$j-1]){
                $m=$arr[$j];
                $arr[$j] = $arr[$j-1];
                $arr[$j-1] =$m;
            }
        }
    }
    return $arr;
}
$arr = array(2,4,1,3,7,9,5,6,2,1,1,1,2,2,4,5,6,4,6);
print_r(maopao($arr));
?>
