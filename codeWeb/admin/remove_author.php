<?php
require '/xampp/htdocs/CSE485_2023/codeWeb/connect.php';
?>

<?php
if (isset($_GET['id'])) {
    $ma_tgia = intval($_GET['id']);
} else {
    header('Location: author.php');
    exit();
}
    $sql_up = "UPDATE baiviet SET ma_tgia = 0 WHERE ma_tgia = :ma_tgia;";
    $sql_remove = "DELETE FROM tacgia WHERE ma_tgia = :ma_tgia";
    $result = pdo($pdo,$sql_up,['ma_tgia' => $ma_tgia]);
    $result_1 = pdo($pdo,$sql_remove,['ma_tgia' => $ma_tgia]);

if ($result_1) {
    echo "<script>alert('Xóa tác giả thành công!');</script>";
    echo "<script>window.location = 'author.php'</script>";
} else {
    echo "<script>alert('Xóa tác giả thất bại!');</script>";
    echo "<script>window.location = 'author.php'</script>";
}
?>