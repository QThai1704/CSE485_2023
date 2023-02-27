   <?php
                        // Kiểm tra nếu người dùng đã đăng nhập thì chuyển hướng người dùng đến trang chính
                        include ('session.php');
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
                                        if ($user['name'] == "") {
                                             echo '<div class="alert alert-success d-flex justify-content-center align-items-center" style="color: red;">Username không được để trống!</div>';
                                        } else if (!$errors['name'] = is_username($user['name'], 5, 15)) {
                                            // Username không đúng độ dài, hiển thị thông báo lỗi
                                            echo '<div class="alert alert-success d-flex justify-content-center align-items-center" style="color: red;">Username phải có độ dài từ 5 đến 15 ký tự!</div>';
                                        }  
                                        else if( ! $errors['password']  = is_password($user['password'])){
                                            echo '<div class="alert alert-success d-flex justify-content-center align-items-center" style="color: red;">Password phải có độ dài từ 8 đến 16 ký tự,có ít nhất 1 ký tự hoa ,số và không chứa ký tự đặc biệt!</div>';
                                        }
                                        include ('login.php');
                                    } else {                                             
                                        $sql = "select * from users where username = :username";
                                        $result = pdo ($pdo, $sql, ['username'=>$user['name']]);
                                        $users = $result->fetch();
                                      
                                        if ($users == "") {
                                                // Tài khoản không tồn tại, hiển thị thông báo lỗi
                                                echo "<p class='alert alert-success d-flex justify-content-center align-items-center'  style='color: red;'>Tài khoản không tồn tại</p>";
                                            } else if ($users['pass_word'] != $user['password']) {
                                                // Mật khẩu không đúng, hiển thị thông báo lỗi
                                                echo "<p class='alert alert-success d-flex justify-content-center align-items-center' style='color: red;'>Mật khẩu không đúng</p>";
                                            } else {
                                                // Đăng nhập thành công, chuyển hướng đến trang chính
                                                if($users['access'] == "admin"){
                                                    //header('Location: login.php');
                                                    echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=http://localhost/cse485_2023/codeWeb/admin/index.php">';     
                                                }
                                                else if($users['access'] == "user"){

                                                    $_SESSION['user_id'] = "1";
                                                       echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=http://localhost/cse485_2023/codeWeb/index.php?user_id="'. $_SESSION['user_id'].'>'; 
                                                }
                                                
                                            }
                                            include ('login.php');
                                                exit();
                                            }
                                            
                                    }
                                    
                            
                            ?>