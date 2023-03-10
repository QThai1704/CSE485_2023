
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
<?php
    include ('../connect.php');
        $username = $_GET['id'];
        $sql_edit = "Select * from users where username = :username;";
        $result_e = pdo($pdo, $sql_edit, ['username'=>$username]);
    ?>
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
                        <a class="nav-link active fw-bold" href="category.php">Thể loại</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="author.php">Tác giả</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="article.php">Bài viết</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user.php">Người dùng</a>
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
                <h3 class="text-center text-uppercase fw-bold">Sủa thông tin người dùng</h3>
                <?php
                        if($result_e->rowCount() > 0){
                            $row = $result_e->fetch(PDO::FETCH_ASSOC);
                    ?>
                <form action="edit_user.php?id=<?php echo  $row['username']; ?>" method="post">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="">Tên người dùng</span>
                        <input type="text" class="form-control" name="username" value="<?php echo  $row['username'];?>" >
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="">Mật khẩu</span>
                        <input type="text" class="form-control" name="password" value="<?php echo  $row['pass_word'];?>">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="">Tên đầy đủ</span>
                        <input type="text" class="form-control" name="fullname" value="<?php echo $row['fullname'];?>" >
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="">Tuổi</span>
                        <input type="text" class="form-control" name="age" value="<?php  echo  $row['age'];?> ">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Quyền</span>
                         <select class="form-select" name="access" value="<?php  echo  $row['access'];?> ">
                            <option value="<?php  echo  $row['access'];?>"><?php  echo  $row['access'];?></option>
                            <option value="admin">admin</option>
                            <option value="user">user</option>
                        </select>
                    </div>


                    <div class="form-group  float-end ">
                        <input type="submit" value="Thêm" class="btn btn-success">
                        <a href="category.php" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
                <?php
                        }
                        ?>
            </div>
        </div>
    </main>

    <?php
                                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                               // include('../connect.php');
                                require '../include/validate.php';
                                $usernameT = $_POST['username'] ; 
                                $passwordT = $_POST['password'];
                                $fullname = $_POST['fullname'];
                                $age = $_POST['age'];
                                $access = $_POST['access'];
                                $errors = [
                                    'name'  => '',
                                    'password'   => '',
                                    'fullname' => '',
                                    'age' => '',
                                ]; 
                                $error['name'] = is_username($usernameT, 5, 15) ? '' : "Giới hạn từ 5 đến 15 ký tự";
                                $error['password']   = is_password($passwordT) ? '': "Phải có độ dài từ 8 đến 16 ký tự,có ít nhất 1 ký tự hoa ,số và không chứa ký tự đặc biệt";
                                $error['fullname'] = is_name($fullname, 5, 15) ? '' : "Phải là tên , không có số và ký tự đặc biệt";
                                $error['age'] = (is_number($age,6,100) && is_valid_integer($age))? '':"Phải là số nguyên";
                                
                                $invalids = implode($error);  
                                     
                                if (!$invalids == '') {                                           
                                    echo $message = 'Please correct the following errors:'; 
                                    if ($usernameT == "" || $passwordT =="" || $fullname =="" || $age == "") {
                                        echo "<p style='color: red;'>Phải điền đầy đủ thông tin</p>";
                                    } else if (!$error['name'] = is_username($usernameT, 5, 15)) {
                                        // Username không đúng độ dài, hiển thị thông báo lỗi
                                        echo "<p style='color: red;'>Username phải có độ dài từ 5 đến 15 ký tự</p>";
                                    }  
                                    else if( !$error['password']   = is_password($passwordT)){
                                        echo "<p style='color: red;'>Password phải có độ dài từ 8 đến 16 ký tự,có ít nhất 1 ký tự hoa ,số và không chứa ký tự đặc biệt</p>";
                                    }
                                    else if(!$error['fullname'] = is_name($fullname, 5, 15)){
                                        echo "<p style='color: red;'>Phải là tên , không có số và ký tự đặc biệt</p>";
                                    }
                                    else if( !$error['age'] = (is_number($age,6,100) && is_valid_integer($age))){
                                        echo "<p style='color: red;'>Phải là số nguyên</p>";
                                    }
                                } else {
                                // Kiểm tra tài khoản có tồn tại trong cơ sở dữ liệu hay không
                                try {
                                        $sql_eu = "update users set username = :username , pass_word = :password, fullname = :fullname, age = :age , access = :access where username = :usernam";
                                        $result_eu = pdo ($pdo , $sql_eu, ['username'=>$usernameT, 'password'=>$passwordT, 'fullname'=>$fullname, 'age'=>$age, 'access'=>$access, 'usernam'=>$username]);
                                        echo '<script> alert("Cập nhật thành công!") </script>';
                                        echo '<script> window.location = "user.php" </script>';
                                       // echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=http://localhost/cse485_2023/codeWeb/login.php">';  
                                    }catch(exception $e){
                                        echo $e->getMessage();
                                    }
                                 }
                                }
                            ?>
    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary  border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>