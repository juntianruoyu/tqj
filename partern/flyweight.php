<?php
/*
 * ��Ԫģʽ���Թ���ķ�ʽ��Ч��֧�ִ�����ϸ���ȶ���
 */
class FlyweightBook {
	private $author;
	private $title;
	function __construct($author_in, $title_in) {
		$this->author = $author_in;
		$this->title  = $title_in;
	}
	function getAuthor() {
		return $this->author;
	}
	function getTitle() {
		return $this->title;
	}
}

class FlyweightFactory {
	private $books = array();
	function __construct() {
		$this->books[1] = NULL;
		$this->books[2] = NULL;
		$this->books[3] = NULL;
	}
	function getBook($bookKey) {
		if (NULL == $this->books[$bookKey]) {
			$makeFunction = 'makeBook'.$bookKey;
			$this->books[$bookKey] = $this->$makeFunction();
		}
		return $this->books[$bookKey];
	}
	 
	function makeBook1() {
		$book = new FlyweightBook('JK����','����������ħ��ʯ');
		return $book;
	}
	function makeBook2() {
		$book = new FlyweightBook('JK����','�����������Ѫ����');
		return $book;
	}
	function makeBook3() {
		$book = new FlyweightBook('JK����','���������밢�ȿ������ͽ');
		return $book;
	}
}

class FlyweightBookShelf {
	private $books = array();
	function addBook($book) {
		$this->books[] = $book;
	}
	function showBooks() {
		$return_string = NULL;
		foreach ($this->books as $book) {
			$return_string .= '����: '.$book->getAuthor().'  ����: '.$book->getTitle();
		};
		return $return_string;
	}
}

writeln('��ʼ������Ԫģʽ');

$flyweightFactory = new FlyweightFactory();
$flyweightBookShelf1 =  new FlyweightBookShelf();// ����һ�������1
$flyweightBook1 = $flyweightFactory->getBook(1); // �ӹ���������1
$flyweightBookShelf1->addBook($flyweightBook1);  // ����1�ŵ����1
$flyweightBook2 = $flyweightFactory->getBook(1); // �ӹ�����ȡ��1
$flyweightBookShelf1->addBook($flyweightBook2);  // ����2����ʵ������1���ŵ����1�� ��ʱ�����1����������1

writeln('���� 1 - �������Ƿ���ͬһ����');
if ($flyweightBook1 === $flyweightBook2) {
	writeln('1 �� 2 ��һ����');
} else {
	writeln('1 �� 2 �ǲ�һ����');
}
writeln('');

writeln('���� 2 - һ������ͬһ������ϳ�������');
writeln($flyweightBookShelf1->showBooks());
writeln('');

$flyweightBookShelf2 =  new FlyweightBookShelf();// ����һ�������2
$flyweightBook1 = $flyweightFactory->getBook(2); // �ӹ���������2
$flyweightBookShelf2->addBook($flyweightBook1);  // ����2�ŵ����2
$flyweightBookShelf1->addBook($flyweightBook1);  // ����2�ŵ����1

writeln('���� 3 - ���1');
writeln($flyweightBookShelf1->showBooks()); // ��ӡ�������1�ϵ������飬��1
writeln('');

writeln('���� 3 - ���2');
writeln($flyweightBookShelf2->showBooks()); // ��ӡ�������2�ϵ�һ���飬��2
writeln('');

writeln('����������Ԫģʽ');

function writeln($line_in) {
	//echo $line_in.PHP_EOL;
    echo $line_in."<br/>";
}
?>