<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 *  先在表上画逻辑
 */

function xuanze($arr){
    $len = count($arr);
    for($i=0;$i<$len-1;$i++){
        $k = $i;
        for($j=$i+1;$j<$len;$j++){
            
            if($arr[$j]>$arr[$k]){
                $k = $j;
            }
        }
        if($k!=$i){
            $n = $arr[$k];
            $arr[$k] = $arr[$i];
            $arr[$i] = $n;
        }
        
    }
    return $arr;
}

$arr = array(9,1,2,3,2,5,6,7,4,5,6,8);
print_r(xuanze($arr));

?>
