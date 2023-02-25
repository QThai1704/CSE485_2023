<?php
    include('../connect.php');
    //Xử lý update cho bài viết

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $maBaiViet   = $_POST['maBaiViet'];
        $tieuDe   = $_POST['tieuDe'];
        $tenBaiHat   = $_POST['tenBaiHat'];
        $tomTat   = $_POST['tomTat'];
        $noiDung   = $_POST['noiDung'];
        $ngayViet   = $_POST['ngayViet'];
        $linkHinhAnh   = $_POST['linkHinhAnh'];
    }
    $id_bviet = $_GET['id'];
    $sql_update = "Update baiviet set ma_bviet = '.$id_bviet.',tieude = '$tieuDe', ten_bhat = '$tenBaiHat', tomtat = '$tomTat', noidung = '$noiDung', ngayViet = '$ngayViet', hinhanh = '$linkHinhAnh' where ma_bviet ='.$id_bviet.';";
    $result = pdo($pdo, $sql_update);
    var_dump($result);
    //Xử lý update cho bài viết
?>