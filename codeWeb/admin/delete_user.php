<?php
include('../connect.php');
?><?php

if (isset($_GET['id'])) {
    $username = $_GET['id'];
} else {
    header('Location: user.php');
    exit();
}



    // $sql_update = "UPDATE baiviet SET ma_tloai=0 WHERE ma_tloai = :ma_tloai";
    // $result_update = pdo($pdo,$sql_update,['ma_tloai' => $ma_tloai]);

    $sql = "DELETE FROM users WHERE username = :username";
    $result = pdo($pdo,$sql,['username' => $username]);
    if ($result) {
        echo "<script>alert('Xóa người dùng thành công!');</script>";
        echo "<script>window.location = 'user.php'</script>";
    } else {
        echo "<script>alert('Xóa người dùng thất bại!');</script>";
        echo "<script>window.location = 'user.php'</script>";
    }




?>