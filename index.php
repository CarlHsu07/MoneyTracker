<?php
	session_start();// Initialize the session

	// Check if the user is already logged in, if yes then redirect member to welcome page
	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
	{
		header("location: bookkeeping.php");
		exit;
	}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8"/>
    <title>記帳系統 - 登入</title>
    <style>
      body {
        background-color: antiquewhite ;
        font-family: Arial, Helvetica, sans-serif, "微軟正黑體";
        width: 30%;
        margin: 0 auto;
      }
      * {
        box-sizing: border-box;
      }
        
      input:required {
        background-color: black;
      }
        
        
      input[type=text], input[type=password],input[type=email] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0px 16px 0px;
        display: inline-block;
        border: none;
        background: #f1f1f1;
        border-radius:4px;
      }

      button {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0px;
        border: none;
        cursor: pointer;
        width: 100%;
        border-radius:4px;
      }

      .button02{
      background-color: #2160F1;
      }
        
      .button03{
      background-color: #f44336;
      width: 50%;
      margin: 0% 0% 0% 50%;
      }
          

      button:hover {
        opacity: 0.8;
      }

      .cancelbtn {
        width: 120px;
        margin: 0% 0% 0% 10%;
        background-color: #f44336;
      }

      .imgcontainer {
        font-size: 36px;
        text-align: center;
        margin: 4px 0 4px 0;
      }

      img.dollar {
        width: 30%;
        border-radius: 50%;
      }

      .container {
        background-color: white;
        padding: 16px;
        border-radius:8px
      }

      span.psw {
        float: right;
        padding-top: 16px;
      }

      /* Change styles for span and cancel button on extra small screens */
      @media screen and (max-width: 300px) {
        span.psw {
          display: block;
          float: none;
        }
        .cancelbtn {
          width: 100%;
        }
      }
    </style>
  </head>
  <body>

    <style>
          html {
              height: 100%;
          }

          body {
              background-image: url("./images/DSC07806.JPG");
              background-repeat: no-repeat;
              background-attachment: fixed;
              background-position: center;
              background-size: cover;
          }
    </style>
    
    <div class="imgcontainer">
      <img src="./images/dollor.png" alt="" class="dollar">
    </div>

    <label><div class="imgcontainer"><b>記 帳 系 統</b></div></label>

    <form action="login.php" method="post">
      <div class="container">
        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="請輸入電子郵件" name="email" value="test@example.com" pattern="[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?" required="required">

        <label for="psw"><b>密碼</b></label>
        <input type="password" placeholder="請輸入密碼" name="psw" value="" required="required">
            
        <button type="submit"><b>登入</b></button>
        <button type="button" class="button02" onclick="location.href='registered.html'"><b>註冊</b></button>
                              
        <!-- <label>
          <input type="checkbox" checked="checked" name="remember"><font size="2"><font face="微軟正黑體">記住我</font></font>
        </label> -->
        
        <!-- <div style="margin:40px 0px 30px 0px;text-align:center;"><b> © Copyright 2020</b></div> -->
      </div>
    </form>
    
    
  </body>
</html>

