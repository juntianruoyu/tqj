<form action="http://localhost/tqj/partern/s1.php" method="post">
<p>第一个值</p><input type="text" name="one">
<p>运算符</p>
<select name='oper'>
<option value='1'>+</option>
<option value='2'>-</option>
<option value='3'>*</option>
<option value='4'>/</option>
</select>
<p>第二个值</p><input type="text" name="two">
<input type="submit" value="运算">
</form>
<?php
include 'E:\wamp\www\tqj\partern\p2.php';
if(!empty($_POST)){
	if($_POST['one'] ==''||$_POST['two']==''){
		echo '请输入两个操作数';exit;
	}else{
		$a = $_POST['one'];
		$b = $_POST['two'];
		$oper = $_POST['oper'];
		$res = new operator($a, $b, $oper);
		echo $res->getresult();
	}
}else{
	echo '请输入运算数及操作符';
}
?>
