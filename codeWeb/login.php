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
                        <h3>Sign In</h3>
                        <div class="d-flex justify-content-end social_icon">
                            <span><i class="fab fa-facebook-square"></i></span>
                            <span><i class="fab fa-google-plus-square"></i></span>
                            <span><i class="fab fa-twitter-square"></i></span>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="login.php" method="POST">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="txtUser"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" name="username" placeholder="username" >
                                
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="txtPass"><i class="fas fa-key"></i></span>
                                <input type="text" class="form-control" name="password" placeholder="password" >
                            </div>
                            
                            <div class="row align-items-center remember">
                                <input type="checkbox" name="terms">Remember Me
                            </div>
                            <div class="form-group">
                                <input href="" type="submit" value="Login" class="btn float-end login_btn">
                            </div>
                        </form>
                        <?php
                   

                        // Kiểm tra nếu người dùng đã đăng nhập thì chuyển hướng người dùng đến trang chính
                        
                                $user = [
                                    'name'  => '',
                                    'password'   => '',
                                    'terms' => '',
                                ];                                                           
                                $errors = [
                                    'name'  => '',
                                    'password'   => '',
                                    'terms' => '',
                                ];                                                            

                                if ($_SERVER['REQUEST_METHOD'] == 'POST') {  
                                    include('connect.php');
                                    require 'include/validate.php';                  
                                    $user['name']  = $_POST['username'];                         
                                    $user['password']   = $_POST['password'];                           
                                    $user['terms'] = (isset($_POST['terms']) and $_POST['terms'] == true) ? true : false;

                                    
                                    $errors['name']  = is_username($user['name'], 5, 15) ? '' : "1";
                                    $errors['password']   = is_password($user['password']) ? '': "1";
                                   // $errors['terms'] = $user['terms']                  ? '' : 'You must agree to the terms
                                    //    and conditions';                                      // Validate data

                                    $invalid = implode($errors);                             
                                    if ($invalid) {                                           
                                        echo $message = 'Please correct the following errors:'; 
                                        if ($user['name'] == "") {
                                            echo "<p style='color: red;'>Username không được để trống</p>";
                                        } else if (!$errors['name'] = is_username($user['name'], 5, 15)) {
                                            // Username không đúng độ dài, hiển thị thông báo lỗi
                                            echo "<p style='color: red;'>Username phải có độ dài từ 5 đến 15 ký tự</p>";
                                        }  
                                        else if( ! $errors['password']  = is_password($user['password'])){
                                            echo "<p style='color: red;'>Password phải có độ dài từ 8 đến 16 ký tự,có ít nhất 1 ký tự hoa ,số và không chứa ký tự đặc biệt</p>";
                                        }
                                    } else {                                             
                                       
                                        $sql = "select * from users where username = :username";
                                        $result = pdo ($pdo, $sql, ['username'=>$user['name']]);
                                        $users = $result->fetch();
                                   
                                        if (!$user ) {
                                                // Tài khoản không tồn tại, hiển thị thông báo lỗi
                                                echo "<p style='color: red;'>Tài khoản không tồn tại</p>";
                                            
                                            } else if ($users['pass_word'] != $user['password']) {
                                                // Mật khẩu không đúng, hiển thị thông báo lỗi
                                                echo "<p style='color: red;'>Mật khẩu không đúng</p>";
                                            } else {
                                                // Đăng nhập thành công, chuyển hướng đến trang chính
                                                if($users['access'] == "admin"){
                                                    //header('Location: login.php');
                                                    echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=http://localhost/cse485_2023/codeWeb/admin/index.php">';     
                                                }
                                                else if($users['access'] == "user"){
                                                    try{
                                                        
                             
                                                     //   $_SESSION['user_id'] = 1;
                                                       echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=http://localhost/cse485_2023/codeWeb/index.php?user_id="'.$_SESSION['user_id'].'>'; 

                                                    }
                                                    catch(exception $e ){
                                                    echo $e.getMessage();
                                                    }
                                                    
                                                      
                                                    
                                                }
                                                
                                            }
                                                exit();
                                            }
                                    }
                            
                            ?>
                            
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center ">
                            Don't have an account?<a href="signup.php" class="text-warning text-decoration-none">Sign Up</a>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="#" class="text-warning text-decoration-none">Forgot your password?</a>
                        </div>
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