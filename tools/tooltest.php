<?php
include 'GetApi.class.php';

$api = 'http://mixservicenew.dangdang.com/shop/page/489';
$params = array('template_id'=>1);
$res = GetApi::request($api,'GET',$params);
echo $res;