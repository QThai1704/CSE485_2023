<?php
    include("../connect.php");
    //Xử lý thêm bài viết
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $I_tieuDe   = $_POST['I_tieuDe'];
        $I_tenBaiHat   = $_POST['I_tenBaiHat'];
        $I_maTheLoai = $_POST['I_tenTheLoai'];
        $I_tomTat   = $_POST['I_tomTat'];
        $I_noiDung   = $_POST['I_noiDung'];
        $I_maTacGia = $_POST['I_tenTacGia'];
        $I_ngayViet   = $_POST['I_ngayViet'];
        $I_linkHinhAnh   = $_POST['I_hinhAnh'];
    }
    var_dump($_POST);
    $sql_select = "select * from baiviet";
    $result_select = pdo($pdo, $sql_select)->rowCount();
    $sql_insert = "INSERT INTO baiviet(ma_bviet, tieude, ten_bhat, ma_tloai, tomtat, noidung, ma_tgia, ngayviet, hinhanh) VALUES (:ma_bviet,:tieude,:ten_bhat,:ma_tloai,:tomtat,:noidung,:ma_tgia,:ngayviet,:hinhanh)";
    $result_insert = pdo($pdo, $sql_insert, [$result_select+1, 'tieude' => $I_tieuDe, 'ten_bhat' => $I_tenBaiHat,'ma_tloai' => $I_maTheLoai, 'tomtat' => $I_tomTat,'noidung' => $I_noiDung,'ma_tgia' => $I_maTacGia,'ngayviet' => $I_ngayViet,'hinhanh' => $I_linkHinhAnh]);
    if ($result_insert) {
        echo "<script>alert('Thêm bài viết thành công!');</script>";
        echo "<script>window.location = 'article.php'</script>";
    } else {
        echo "<script>alert('Thêm bài viết thất bại!');</script>";
        echo "<script>window.location = 'article.php'</script>";
    }
?>