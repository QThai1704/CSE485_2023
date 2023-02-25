<?php
    include("../connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
            <div class="container-fluid">
                <div class="h3">
                    <a class="navbar-brand" href="#">Administration</a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Trang ngoài</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="category.php">Thể loại</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="author.php">Tác giả</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" href="article.php">Bài viết</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>

    </header>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Thêm mới thể loại</h3>
                <?php
                    $sql_select_tgia = "select ma_tgia, ten_tgia from tacgia";
                    $result_select_tgia = pdo($pdo, $sql_select_tgia);
                    $sql_select_tloai = "select ma_tloai, ten_tloai from theloai";
                    $result_select_tloai = pdo($pdo, $sql_select_tloai);
                ?>
                <form action="add_article.php" method="post">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tiêu đề</span>
                        <input type="text" class="form-control" name="I_tieuDe" >
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tên bài hát</span>
                        <input type="text" class="form-control" name="I_tenBaiHat" >
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Tên thể loại</label>
                        <select class="form-select" id="inputGroupSelect01" name = "I_tenTheLoai">
                            <option selected></option>
                            <?php
                                if($result_select_tloai->rowCount() > 0){
                                    $i=0;
                                    while($row = $result_select_tloai->fetch(PDO::FETCH_ASSOC)){
                                        $i+=1;
                                    
                            ?>
                                <option value="<?php echo $row['ma_tloai'] ?>"><?php echo $row['ten_tloai'] ?></option>
                            <?php       
                                    }
                                };
                            ?>
                        </select>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tóm tắt</span>
                        <input type="text" class="form-control" name="I_tomTat" >
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Nội dung</span>
                        <input type="text" class="form-control" name="I_noiDung" >
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Tên tác giả</label>
                        <select class="form-select" id="inputGroupSelect01" name = "I_tenTacGia">
                            <option selected></option>
                            <?php
                                if($result_select_tgia->rowCount() > 0){
                                    $i=0;
                                    while($row = $result_select_tgia->fetch(PDO::FETCH_ASSOC)){
                                    
                            ?>
                                <option value="<?php echo $row['ma_tgia'] ?>"><?php echo $row['ten_tgia'] ?></option>
                            <?php       
                                    }
                                };
                            ?>
                        </select>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Ngày viết</span>
                        <input type="text" class="form-control" name="I_ngayViet" >
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Hình ảnh</span>
                        <input type="text" class="form-control" name="I_hinhAnh" >
                    </div>
                    <div class="form-group  float-end ">
                        <input type="submit" value="Thêm" class="btn btn-success">
                        <a href="article.php" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php
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
    $sql_select = "select * from baiviet";
    $result_select = pdo($pdo, $sql_select)->rowCount();
    $sql_insert = "INSERT INTO baiviet(ma_bviet, tieude, ten_bhat, ma_tloai, tomtat, noidung, ma_tgia, ngayviet, hinhanh) VALUES (:ma_bviet,:tieude,:ten_bhat,:ma_tloai,:tomtat,:noidung,:ma_tgia,:ngayviet,:hinhanh)";
    $result_insert = pdo($pdo, $sql_insert, [$result_select+1, 'tieude' => $I_tieuDe, 'ten_bhat' => $I_tenBaiHat,'ma_tloai' => $I_maTheLoai, 'tomtat' => $I_tomTat,'noidung' => $I_noiDung,'ma_tgia' => $I_maTacGia,'ngayviet' => $I_ngayViet,'hinhanh' => $I_linkHinhAnh]);
    include('../include/footer.php');
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>