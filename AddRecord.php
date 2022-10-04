<?php // 新增帳目紀錄
    
    include "db.php";

    $member_SN = $_POST["id"]; // 會員編號
    $classification = $_POST["classification"]; // 分類
    $date = $_POST["date"]; // 日期
    $bookkeeping_content = $_POST["content"]; // 內容
    $money = $_POST["money"]; // 金額
    
    $sqlQuery = $conn->prepare("INSERT INTO `money_tracker`.`bookkeeping_detail` (`member_SN`, `classification`, `date`, `bookkeeping_content`, `money`) VALUES (?, ?, ?, ?, ?)");
    $sqlQuery->bind_param('sssss', $member_SN, $classification, $date, $bookkeeping_content, $money);
    
    if($sqlQuery->execute())
    {
        echo "<script> alert('新增成功！'); </script>";
        echo "<meta http-equiv='Refresh' content=0;URL='bookkeeping.php'>";
    }
    else
    {
        echo "<script> alert('新增失敗！請重試！'); </script>";
        echo "<meta http-equiv='Refresh' content=0;URL='bookkeeping.php'>";
    }

    // 關閉DB連線
    $conn->close();
    exit();
?>