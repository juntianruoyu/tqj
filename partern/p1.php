<?php 
class mysort{
	
	public $arr;
	
	public function __construct($param){
		$this->arr = $param;
	}
	
	/*============ð������==============*/
	public function bubble_sort(){
		$pre_arr = $this->arr;
		$len = count($pre_arr);
		for ($i=0;$i<$len-1;$i++){
			for ($j=0;$j<$len-1-$i;$j++){
				if($pre_arr[$j]>$pre_arr[$j+1]){
					$tmp = $pre_arr[$j];
					$pre_arr[$j] = $pre_arr[$j+1];
					$pre_arr[$j+1] = $tmp;
				}
			}
		}
		return $pre_arr;
	}
	
	/*===========ð�ݵĸĽ��㷨������Ѿ��ź��������򲿷��ź��������=================*/
	public function improve_bubble(){
		$pre_arr = $this->arr;
		$len = count($pre_arr);
		for ($i=0;$i<$len-1;$i++){
			$flag = 0;
			for ($j=0;$j<$len-1-$i;$j++){
				if($pre_arr[$j]>$pre_arr[$j+1]){
					$tmp = $pre_arr[$j];
					$pre_arr[$j] = $pre_arr[$j+1];
					$pre_arr[$j+1] = $tmp;
					
					$flag = 1;
				}
			}
			if($flag == 0) break; 
		}
		return $pre_arr;
	}
	
	/*============���³��ף�ð�ݷ�==============*/
	public function bubble_other(){
		$pre_arr = $this->arr;
		$len = count($pre_arr);
		for ($i=0;$i<$len-1;$i++){
			for ($j=$len-1;$j>$i;$j--){
				if($pre_arr[$j]<$pre_arr[$j-1]){
					$tmp = $pre_arr[$j];
					$pre_arr[$j] = $pre_arr[$j-1];
					$pre_arr[$j-1] = $tmp;
				}
			}
		}
		return $pre_arr;
	}
	/*============ѡ������===============*/
	public function select_sort(){
		$pre_arr = $this->arr;
		$len = count($pre_arr);
		for($i=0;$i<$len-1;$i++){
			$k = $i;
			for ($j=$i+1;$j<$len;$j++){
				if($pre_arr[$j]<$pre_arr[$k]){
					$k = $j;
				}
			}
			if($k!=$i){
				$tmp = $pre_arr[$k];
				$pre_arr[$k] = $pre_arr[$i];
				$pre_arr[$i] = $tmp;
			}
		}
		
		return $pre_arr;
	}	
	
	/*=========��������================*/
	public function quick_sort(){
		$pre_arr = $this->arr;
		$len = count($pre_arr);
		if($len <= 1){//ע���˳�����С�ڵ���1
			return $pre_arr;
		}
		$l_arr = array();
		$r_arr = array();
		$key = $pre_arr[0];
		for ($i=1;$i<$len;$i++){
			if($pre_arr[$i]<$key){
				$l_arr[]=$pre_arr[$i];
			}else{
				$r_arr[]=$pre_arr[$i];
			}
		}
		$arr_1 = new self($l_arr);
		$arr_1 = $arr_1->quick_sort();
		$arr_2 = new self($r_arr);
		$arr_2 = $arr_2->quick_sort();
		$arr = array_merge($arr_1,array($key),$arr_2);
		return $arr;
	}
	
	/*============��������==============*/
	public function insert(){
		$pre_arr = $this->arr;
		$len = count($pre_arr);
		if($len <= 1){
			return $pre_arr;
		}
		$new_arr[0] = $pre_arr[0];
		for($i=1;$i<$len;$i++){
			$j = $i-1;
			if($pre_arr[$i]<$new_arr[$j]){
				while ($pre_arr[$i]<$new_arr[$j]){//���뵽��ȷ��λ�ã�����
					$new_arr[$j+1] = $new_arr[$j];
					$new_arr[$j] = $pre_arr[$i];
					$j--;
					if($j<0) break;
				}
			}else{
				$new_arr[$i] = $pre_arr[$i];
			}
		}
		return $new_arr;
		
	}
	
}
$param = array(5,2,1,4,3,-2,0,0,0,-3);
$m = new mysort($param);
$arr = $m->bubble_sort();
$arr = $m->improve_bubble();
$arr = $m->bubble_other();
$arr = $m->select_sort();
$arr = $m->quick_sort();
$arr = $m->insert();
echo "<pre/>";
print_r($arr);
?>