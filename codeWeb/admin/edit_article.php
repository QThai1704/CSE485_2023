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
    <?php
        $id_bviet = $_GET['id'];
        $sql = "Select ma_bviet, tieude, ten_bhat, tomtat, noidung, ngayviet, hinhanh from baiviet where ma_bviet = ".$id_bviet.";";
        $result = pdo($pdo, $sql);
    ?>
    <main class="container mt-5 mb-5">
            <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
            <div class="row">
                <div class="col-sm">
                    <h3 class="text-center text-uppercase fw-bold">Sửa thông tin thể loại</h3>
                    <form action="process_article.php" method="post">
                    <?php
                            if($result->rowCount() > 0){
                                $row = $result->fetch();
                    ?>
                        <div class="input-group mt-3 mb-3">
                                <span class="input-group-text" id="lblCatId">Mã bài viết</span>
                                <input type="text" class="form-control" name="maBaiViet" readonly value = "<?php echo $row['ma_bviet'];?>">
                            </div>

                            <div class="input-group mt-3 mb-3">
                                <span class="input-group-text" id="lblCatName">Tiêu đề</span>
                                <input type="text" class="form-control" name="tieuDe" value = "<?php echo $row['tieude'];?>">
                            </div>
                            <div class="input-group mt-3 mb-3">
                                <span class="input-group-text" id="lblCatName">Tên bài hát</span>
                                <input type="text" class="form-control" name="tenBaiHat" value = "<?php echo $row['ten_bhat'];?>">
                            </div>
                            <div class="input-group mt-3 mb-3">
                                <span class="input-group-text" id="lblCatName">Tóm tắt</span>
                                <input type="text" class="form-control" name="tomTat" value = "<?php echo $row['tomtat'];?>">
                            </div>
                            <div class="input-group mt-3 mb-3">
                                <span class="input-group-text" id="lblCatName">Nội dung</span></span>
                                <input type="text" class="form-control" name="noiDung" value = "<?php echo $row['noidung'];?>">
                            </div>
                            <div class="input-group mt-3 mb-3">
                                <span class="input-group-text" id="lblCatName">Ngày viết</span></span>
                                <input type="text" class="form-control" name="ngayViet" value = "<?php echo $row['ngayviet'];?>">
                            </div>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="inputGroupFile02" name = "linkHinhAnh" value = "<?php echo $row['hinhanh'];?>">
                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                            </div>
                            <div class="form-group  float-end ">
                                <input type="submit" value="Lưu lại" class="btn btn-success">
                                <a href="article.php" class="btn btn-warning ">Quay lại</a>
                            </div>
                        </div>
                    <?php
                        };
                    ?>
                    </form>
                </div>
            </div>
    </main>
    <?php
        include('../include/footer.php');
    ?>
    <script>

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>