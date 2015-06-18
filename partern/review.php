<?php
interface process{
	public function dosth();
}

class a implements process{
	function dosth(){
		echo 'do a';
	}
}

class b implements process{
	function dosth(){
		echo 'do b';
	}
}

class context{
	public $m;
	
	public function __construct($m){
		$this->m = $m;
	}
	
	public function res(){
		$this->m->dosth();
	}
}

$a = new context(new b());
$a->res();
?>