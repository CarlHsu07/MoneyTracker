<?php
  session_start();  //可以用的變數存在session裡
  $username = $_SESSION["username"];
  $id = $_SESSION["id"];
?>

<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>記帳系統</title>
    <script src="https://kit.fontawesome.com/7da68b3635.js" crossorigin="anonymous"></script>
    <style>
      body {
        font-family: Arial, Helvetica, sans-serif, "微軟正黑體";
        width: 100%;
        margin: 0 auto;
      }

      * {
        box-sizing: border-box;
        border-radius: 4px
      }

      .input-container {
        display: -ms-flexbox;
        /* IE10 */
        display: flex;
        font-size: 24px;
        width: 100%;
        margin-bottom: 15px;
      }

      .icon {
        padding: 14px;
        background: dodgerblue;
        color: antiquewhite;
        min-width: 100px;
        text-align: center;
      }

      .input-field {
        width: 100%;
        padding: 10px;
        outline: none;
        border: 0px;
      }

      .input-field:focus {
        border: 2px solid dodgerblue;
      }

      /* Set a style for the submit button */
      .btn {
        background-color: #0BBF6C;
        color: white;
        padding: 15px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;

      }

      .button02 {
        background-color: #2160F1;
        color: white;
        padding: 15px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;

      }

      .logout {
        background-color: orangered;
        color: black;
        padding: 15px 20px;
        border: none;
        cursor: pointer;
        width: 100px;
        opacity: 0.9;
        margin: 0% 0% 10% 80%;

      }

      .button02:hover {
        opacity: 1;
      }

      .button03:hover {
        opacity: 1;
      }

      .btn:hover {
        opacity: 1;
      }



      a {
        color: #063EEA;
      }
    </style>
  </head>

  <body>
    <style>
      html {
        height: 100%;
      }

      body {
        background-image: url(./images/wow.JFIF);
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        background-size: cover;
      }
    </style>


    <!-- <script>
      Date.prototype.format = function (fmt) {
        var o = {
          "y+": this.getFullYear, //年
          "M+": this.getMonth() + 1, //月份
          "d+": this.getDate(), //日
          "h+": this.getHours(), //小时
          "m+": this.getMinutes(), //分
          "s+": this.getSeconds() //秒
        };
        if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
        for (var k in o)
          if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
        return fmt;
      }
      setInterval("document.getElementById('dateTime').innerHTML = (new Date()).format('yyyy-MM-dd hh:mm:ss');", 1000);
    </script> -->

    <form method="post" name="logout" style="max-width:500px;margin:0% 0% 0% 55%;">
      <label for="logout">
        <input type="button" class="logout" name="logout" style="font-size: 18px; color: white;" value="登出" onclick="location.href='logout.php'">
      </label>
    </form>

    
    
    <form action="AddRecord.php" method="post" name="bookkeeping" style="max-width:500px;margin:-20px 0% 0% 55%;">
      <div class="input-container">
        <label><b style="color:blue"><?php echo $username; ?>您好~ 請新增帳目紀錄</b></label>
      </div>

      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">

      <div class="input-container">
        <i class="fas fa-sort-amount-down-alt icon"></i>
        <select name="classification" class="input-field" required="required">
          <option value="" disabled selected hidden>請選擇分類</option>
          <option value="食物">食物</option>
          <option value="交通">交通</option>
          <option value="娛樂">娛樂</option>
          <option value="購物">購物</option>
          <option value="其他">其他</option>
        </select>
      </div>

      <div class="input-container">
        <i class="fas fa-calendar-week icon"></i>
        <input class="input-field" name="date" type="date" id="date" required="required">
      </div>

      <div class="input-container">
        <i class="fas fa-book-open icon"></i>
        <input class="input-field" name="content" type="text" placeholder="帳目名稱" required="required">
      </div>

      <div class="input-container">
        <i class="fas fa-dollar-sign icon"></i>
        <input class="input-field" name="money" type="number" placeholder="金額" min="1" required="required">
      </div>

      <button type="submit" class="button02"><b>新增記帳</b></button>
      <button type="reset" class="btn"><b>重填</b></button>
    </form>

    <div class="detail" style="max-width:50%; margin: -400px 0% 0% 0%;">
      <iframe src="show_detail.php" width="100%" height="600px" frameborder="0" scrolling="yes">*</iframe>
    </div>

  </body>
</html>