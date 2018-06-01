<?php 
$uname = $_REQUEST['uname'];
$msg = $_REQUEST['msg'];


$con = mysql_connect('localhost','root','');
mysql_select_db('cos_login_db',$con);


mysql_query("INSERT INTO chat (`username`, `msg`) VALUES ('$uname','$msg')");


$results1 = mysql_query("SELECT * FROM chat");

while ($extract = mysql_fetch_array($results1)) {
	echo $extract['username'] . ": " . $extract['msg'] . "<br>";
}



 ?>