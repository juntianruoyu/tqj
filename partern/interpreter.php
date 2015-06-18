<?php
/*
 * ������ģʽ������һ�����ԣ��������ķ���һ�ֱ�ʾ��������һ�����������ý��������øñ�ʾ�����������еľ���
 *
 */
class Expression
{
	function interpreter($str)
	{
		return $str;
	}
}

class ExpressionNum extends Expression
{
	function interpreter($str)
	{
		switch($str)
		{
			case "0": return "��";
			case "1": return "һ";
			case "2": return "��";
			case "3": return "��";
			case "4": return "��";
			case "5": return "��";
			case "6": return "��";
			case "7": return "��";
			case "8": return "��";
			case "9": return "��";
		}
	}
}

class ExpressionCharater extends Expression
{
	function interpreter($str)
	{
		return strtoupper($str);
	}
}

class Interpreter
{
	function execute($string)
	{
		$expression = null;
		for($i = 0;$i<strlen($string);$i++) {
			$temp = $string[$i];
			switch(true)
			{
				case is_numeric($temp): $expression = new ExpressionNum(); break;
				default: $expression = new ExpressionCharater();
			}
			echo $expression->interpreter($temp);
		}
	}
}

$obj = new Interpreter();
$obj->execute("sdf12345abc");
?>