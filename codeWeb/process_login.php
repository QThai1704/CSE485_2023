   <?php
                   

                        // Kiểm tra nếu người dùng đã đăng nhập thì chuyển hướng người dùng đến trang chính
                        session_start();
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
                                        //echo $message = 'Please correct the following errors:'; 
                                        
                                        if ($user['name'] == "") {
                                             echo '<div class="alert alert-success d-flex justify-content-center align-items-center" style="color: red;">Username không được để trống!</div>';

                                           // echo '<script>alert("Hello, world!");</script>';

                                          // echo $error =  "<p style='color: red;'>Username không được để trống</p>";
                                          
                                        } else if (!$errors['name'] = is_username($user['name'], 5, 15)) {
                                            // Username không đúng độ dài, hiển thị thông báo lỗi
                                           // echo "<p style='color: red;'>Username phải có độ dài từ 5 đến 15 ký tự</p>";
                                        }  
                                        else if( ! $errors['password']  = is_password($user['password'])){
                                           // echo "<p style='color: red;'>Password phải có độ dài từ 8 đến 16 ký tự,có ít nhất 1 ký tự hoa ,số và không chứa ký tự đặc biệt</p>";
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
                                                       echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=http://localhost/cse485_2023/codeWeb/index.php">'; 
                                                       
                                                }
                                                
                                            }
                                                exit();
                                            }
                                    }
                                    include ('login.php');
                            
                            ?>