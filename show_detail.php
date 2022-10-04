<?php
session_start();  //可以用的變數存在session裡
$id = $_SESSION["id"]; // 會員編號
?>
<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <title>記帳明細</title>

  <script>
    var myWindow;

    function openWin() {
      myWindow = window.open("/update.html", "myWindow", "width=900, height=700,resizable=no,location=no,status=no。,left=300px,top=50px");
    }

    function closeWin() {
      myWindow.close();
    }

    function del() {
      var msg = "您真的確定要刪除嗎？\n\n請確認！";
      if (confirm(msg) == true) {
        return true;
      } else {
        return false;
      }
    };
  </script>
  <style>
    html {
      height: 100%;
    }

    body {
      /* background-image: url(http://voky.com.ua/showcase/sky-forms/examples/img/bg-cyan.jpg);*/
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-position: center;
      background-size: cover;
    }

    table {
      border-collapse: collapse;
      border: 10px;
      width: 100%;
    }

    th {
      background-color: #4CAF50;
      color: white;
      text-align: center;
      padding: 12px;
    }

    td {
      padding: 8px;
    }

    tr {
      border-bottom: 1px solid #ddd;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2
    }

    tr:nth-child(odd) {
      background-color: #E2E2E2
    }
  </style>

</head>
<body>
  
    <table width="100%" id="detail_table">
      <tbody>
        <?php
          $month = date('m');
          $day = date('d');
          $year = date('Y');
          $today = $year . '-' . $month . '-' . $day;

          include "db.php";

          $member_SN = $id;

          if (!isset($_POST["detail_date"])) {
            $date = $today;
          } else {
            $date = $_POST["detail_date"];
          }

          $sqlQuery = $conn->prepare("SELECT * FROM bookkeeping_detail WHERE member_SN=? AND `date`=? ORDER BY `bookkeeping_detail_SN` ASC");
          $sqlQuery->bind_param("ss", $member_SN, $date);
          $sqlQuery->execute();
          $result = $sqlQuery->get_result();
        ?>
<tr>
          <td colspan="2">
            <form action="show_detail.php" method="post" name="detail">
              <b>選擇日期：</b><input type="date" name="detail_date" value="<?php echo $date; ?>">&nbsp;&nbsp;
              <button type="submit" name="date_submit"><b>確定</b></button>
            </form>
          </td>
          <td></td>
          <td style="text-align: center;"><?php echo $date; ?></td>
        </tr>
        <tr>
          <th scope="col">&nbsp;<strong>分類</strong>&nbsp;</th>
          <th scope="col"><strong>帳目名稱</strong></th>
          <th scope="col"><strong>金額</strong>&nbsp;</th>
          <th scope="col"><strong>編輯</strong>&nbsp;</th>
        </tr>
        <?php
          if ($result->num_rows > 0) {


            // output data of each row
            while ($row = $result->fetch_row()) {
              echo "<tr>
            <td style=\"text-align: center;\">" . $row[2] . "</td>
            <td style=\"text-align: left;\">" . $row[4] . "</td>
            <td style=\"text-align: right;\">$" . $row[5] . "</td>
            <td style=\"text-align: center;\">
              <form action=\"delete.php\" method=\"post\" name=\"delete\">
                <input type=\"hidden\" name=\"delete_detail\" value=\"" . $row[1] . "\">
                <button type=\"submit\" name=\"delete_btn\" onclick=\"javascript:return del();\"><b>刪除</b></button>
              </form>
            </td>
          </tr>
          ";
            }

            $sqlQuery = $conn->prepare("SELECT SUM(money) FROM bookkeeping_detail WHERE `member_SN`=? AND `date`=?");
            $sqlQuery->bind_param("ss", $member_SN, $date);
            $sqlQuery->execute();
            $result = $sqlQuery->get_result();
            $total = $result->fetch_row();

            echo "<tr>
            <td>&nbsp;<b>總金額：</b></td>
            <td>&nbsp;</td>
            <td style=\"text-align: right;\"><b>$" . $total[0] . "</b></td>
            <td>&nbsp;</td>
          </tr>
          ";

            // $sqlQuery->bind_result($member_SN, $bookkeeping_detail_SN, $classification_SN, $date, $bookkeeping_name, $money);
            // $sqlQuery->fetch();
            // echo $bookkeeping_detail_SN."<br>\n";
            // echo $classification_SN."<br>\n";
            // echo $date."<br>\n";
            // echo $bookkeeping_name."<br>\n";
            // echo $money."<br>\n";

            // echo "<br>\n"."查詢成功！";
            // echo "<meta http-equiv='Refresh' content=0;>";
          } else {
            // echo "查詢失敗！ 請重試！";
            // echo "<meta http-equiv='Refresh' content=0;>";
          }

        ?>
      </tfoot>
    </table>
  
</body>

</html>

<?php 
  // 關閉 MySQL/MariaDB 連線
  $conn->close();
  exit();

?>