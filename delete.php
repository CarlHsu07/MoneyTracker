<?php
    // $message = "run delete";
    // echo "<script type='text/javascript'>alert('$message');</script>";
    // 刪除BD中的指定帳目紀錄
    if (isset($_POST["delete_detail"])) 
    {
        $id = $_POST["delete_detail"];

        include "db.php";

        $sqlQuery = $conn->prepare("DELETE FROM `bookkeeping_detail` WHERE `bookkeeping_detail_SN` = ?");
        $sqlQuery->bind_param('s', $id);

        if($sqlQuery->execute())
        {
            echo "<script> alert('刪除成功！'); </script>";
            echo "<meta http-equiv='Refresh' content=0;URL='show_detail.php'>";
        }
        else
        {
            echo "<script> alert('刪除失敗！請重試！'); </script>";
            echo "<meta http-equiv='Refresh' content=0;URL='show_detail.php'>";
        }

        // 關閉DB連線
        $conn->close();
        exit();

    }
?>