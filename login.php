<?php // 登入帳號

	include "db.php";
	
	$email = "";
	$password = "";
	// 按下登入
	$email = $_POST["email"];
	$password = $_POST["psw"];
			
	//查詢會員資料
	$sql = $conn->prepare("SELECT * FROM `money_tracker`.`member` WHERE `email_addr` =?");
	$sql->bind_param("s",$email);
	$sql->execute();
	$sql->store_result();



	//確認DB裡面是否有該email
	if($sql->num_rows>0)
	{
		$sql->bind_result($memberSN, $memberName, $email, $passwordHash);
	 	$sql->fetch();
	 	// $hash = (string)$passwordHash;

		//檢查密碼是否正確
		if(password_verify($password, $passwordHash))//跟password_hash()搭配使用，用來驗證密碼與hash值
		{
			session_start();
			// 存資料在session變數
			$_SESSION["loggedin"] = true;
			//這些是之後可以用到的變數
			$_SESSION["id"] = $memberSN;
			$_SESSION["username"] = $memberName;

			$message = "登入成功 !";
			echo "<script type='text/javascript'>alert('$message');</script>";
			header("location:bookkeeping.php");
			exit;
		}
		else //密碼不正確
		{
			$message = "帳號或密碼錯誤，請重試！";
			echo "<script type='text/javascript'>alert('$message');</script>";
			echo "<script>history.go(-1)</script>";
			exit;
		}
	}
	else //找不到該email
	{
	 	$message = "帳號或密碼錯誤，請重試！";
		echo "<script type='text/javascript'>alert('$message');</script>";
		echo "<script>history.go(-1)</script>";
	 	exit;
	}

    $conn->close(); // 關閉DB連線
	exit();
?>