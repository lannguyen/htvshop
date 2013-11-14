<?php
$conn = mysql_connect('localhost','root','');
if(!$conn){
	die( 'Ket noi that bai! ' . mysql_errno());
}

mysql_set_charset("utf8",$conn);

$db = mysql_select_db('htvsite.com');	
if(!$db){
	die ('Sai CSDL ' . mysql_error());
}

?>