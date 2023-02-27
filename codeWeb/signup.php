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
                <div class="my-logo">
                    <a class="navbar-brand" href="#">
                        <img src="images/logo2.png" alt="" class="img-fluid">
                    </a>
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
                    <a class="nav-link active" href="./login.php">Đăng nhập</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Nội dung cần tìm" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Tìm</button>
                </form>
                </div>
            </div>
        </nav>

    </header>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="d-flex justify-content-center h-100">
                <div class="card">
                    <div class="card-header">
                        <h3>Sign Up</h3>
                        <div class="d-flex justify-content-end social_icon">
                            <span><i class="fab fa-facebook-square"></i></span>
                            <span><i class="fab fa-google-plus-square"></i></span>
                            <span><i class="fab fa-twitter-square"></i></span>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="signup.php" method="POST">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="txtUser"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" name="username" placeholder="username" >
                                
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="txtPass"><i class="fas fa-key"></i></span>
                                <input type="text" class="form-control" name="password" placeholder="password" >
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="txtPass"><i class="fas fa-key"></i></span>
                                <input type="text" class="form-control" name="re-enter password" placeholder="re-enter password" >
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="fullname"><i class="fas fa-user-circle"></i></span>
                                <input type="text" class="form-control" name="fullname" placeholder="fullname" >
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="age"><i class="fas fa-edit"></i></span>
                                <input type="text" class="form-control" name="age" placeholder="age" >
                            </div>
                            
                            <!-- <div class="row align-items-center remember">
                                <input type="checkbox">Remember Me
                            </div> -->
                            <div class="form-group">
                                <input href="" type="submit" value="Sign Up" class="btn float-end login_btn">
                            </div>
                        </form>
                        <?php
                            
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                include('connect.php');
                                require 'include/validate.php';
                                $usernameT = $_POST['username'] ; 
                                $passwordT = $_POST['password'];
                                $fullname = $_POST['fullname'];
                                $age = $_POST['age'];
                                
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
                                    $sql_1 = "select * from users";
                                    $result_1 = pdo ($pdo,$sql_1);

                                    $count = 0;
                                    while($r = $result_1->fetch(PDO::FETCH_ASSOC)){
                                           if( $usernameT == $r['username'] )
                                                $count++;
                                        }
                                    
                                    if($count ==0 ){
                                        $sql = "insert into users(username, pass_word, fullname, age) values (:username ,:password , :fullname ,:age)";
                                        $result = pdo ($pdo, $sql, ['username'=>$usernameT , 'password'=>$passwordT, 'fullname'=>$fullname, 'age'=>$age]);
                                        echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=http://localhost/cse485_2023/codeWeb/login.php">';  
                                        }
                                        
                                        else{
                                            echo "<p style='color: red;'>Tên tài khoản đã tồn tại</p>";
                                        }
                                    }catch(exception $e){
                                        echo $e->getMessage();
                                    }
                                 }
                                }
                            ?>
                            
                    </div>
                   
                </div>

        </div>
    </main>
    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary  border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>