<?php
require '/xampp/htdocs/CSE485_2023/codeWeb/connect.php';
?><?php

if (isset($_GET['id'])) {
    $ma_tgia = intval($_GET['id']);
} else {
    header('Location: author.php');
    exit();
}

// Xóa bài viết
$sql = "DELETE FROM tacgia WHERE ma_tgia = '$ma_tgia'";
$result = pdo($pdo,$sql);
if ($result) {
    echo "<script>alert('Xóa tác giả thành công!');</script>";
    echo "<script>window.location = 'author.php'</script>";
} else {
    echo "<script>alert('Xóa tác giả thất bại!');</script>";
    echo "<script>window.location = 'author.php'</script>";
}