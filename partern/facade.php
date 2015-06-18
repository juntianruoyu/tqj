<?php
//facade pattern
class a{
	public function doa(){
		echo 'a';
	}
	
}
class b{
	public function dob(){
		echo 'b';
	}
}
class facade{
	public function dosth(){
		$a = new a();
		$a->doa();
		$b = new b();
		$b->dob();
	}
}
$a = new facade();
$a->dosth();
?>