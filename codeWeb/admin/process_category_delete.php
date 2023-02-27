<?php
include('../connect.php');
?><?php

if (isset($_GET['id'])) {
    $ma_tloai = intval($_GET['id']);
} else {
    header('Location: category.php');
    exit();
}



    $sql_update = "UPDATE baiviet SET ma_tloai=0 WHERE ma_tloai = :ma_tloai";
    $result_update = pdo($pdo,$sql_update,['ma_tloai' => $ma_tloai]);

    $sql = "DELETE FROM theloai WHERE ma_tloai = :ma_tloai";
    $result = pdo($pdo,$sql,['ma_tloai' => $ma_tloai]);
    if ($result) {
        echo "<script>alert('Xóa thể loại thành công!');</script>";
        echo "<script>window.location = 'category.php'</script>";
    } else {
        echo "<script>alert('Xóa thể loại thất bại!');</script>";
        echo "<script>window.location = 'category.php'</script>";
    }




?>