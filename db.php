<?php
	$server="localhost:3306";
	$db_username="money_tracker";
	$db_password="1234";
	$dbname="money_tracker";

	// creat connection
	$conn = mysqli_connect($server, $db_username, $db_password, $dbname);

	// 設定編碼
	mysqli_query($conn, 'SET NAMES utf8');

	// check connection
	if(!$conn)
	{
		die("Connection failled".mysqli_connect_error());
		exit();
	}
?>