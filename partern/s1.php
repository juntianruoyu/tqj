<form action="http://localhost/tqj/partern/s1.php" method="post">
<p>��һ��ֵ</p><input type="text" name="one">
<p>�����</p>
<select name='oper'>
<option value='1'>+</option>
<option value='2'>-</option>
<option value='3'>*</option>
<option value='4'>/</option>
</select>
<p>�ڶ���ֵ</p><input type="text" name="two">
<input type="submit" value="����">
</form>
<?php
include 'E:\wamp\www\tqj\partern\p2.php';
if(!empty($_POST)){
	if($_POST['one'] ==''||$_POST['two']==''){
		echo '����������������';exit;
	}else{
		$a = $_POST['one'];
		$b = $_POST['two'];
		$oper = $_POST['oper'];
		$res = new operator($a, $b, $oper);
		echo $res->getresult();
	}
}else{
	echo '��������������������';
}
?>
