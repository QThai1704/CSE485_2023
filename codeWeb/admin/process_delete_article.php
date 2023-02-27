<?php
    include('../connect.php');
    //Xóa bài viết
    $D_ma_bviet = $_GET['id'];
    $sql_delete = "DELETE FROM baiviet WHERE ma_bviet = :id";
    $result_delete = pdo($pdo, $sql_delete, ['id' => $D_ma_bviet]);
    if ($result_delete) {
        echo "<script>alert('Xóa bài viết thành công!');</script>";
        echo "<script>window.location = 'article.php'</script>";
    } else {
        echo "<script>alert('Xóa bài viết thất bại!');</script>";
        echo "<script>window.location = 'article.php'</script>";
    }
?>