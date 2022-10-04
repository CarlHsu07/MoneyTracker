<?php // 註冊帳號程式

	include "db.php";
	//include "config.php";//session
	
	
	$username = $_POST['nickname']; //會員暱稱
	$email = $_POST['email']; //會員email
	
	// 檢查email是否已存在DB中
	// 使用prepared statement的目的是防止sql injection
	$email_sql = $conn->prepare("SELECT * FROM `money_tracker`.`member` WHERE `email_addr`=?");
	$email_sql->bind_param("s",$email);
	
	// execute query
	$email_sql->execute();
	$email_sql->store_result();
	
	if($email_sql->num_rows>0) // 若num_rows>0表示在DB中有找到相符合的email，代表已被註冊
	{
		$message = "此Email已經被使用過！";
		echo "<script type='text/javascript'>alert('$message');</script>";
		echo "<script>history.go(-1)</script>";
		exit;
	}
	
	// password_hash()會給密碼隨機加鹽
	$password = password_hash($_POST['psw'], PASSWORD_DEFAULT);
	
	// email沒有重複，存資料到DB
	$sql = $conn->prepare("INSERT INTO `money_tracker`.`member` (`member_name`, `email_addr`, `password_hash`) VALUES (?, ?, ?)");
	$sql->bind_param("sss",$username, $email, $password);
	$sql->execute();
	

	echo "<script>alert('註冊成功！');</script>";
	echo "<script>window.location = 'index.php';</script>";
	
	
	$conn->close(); // 關閉DB連線
	exit();
?>