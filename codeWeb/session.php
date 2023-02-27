<?php
session_start();
        
$is_logged_in = isset($_SESSION['user_id']);

if (isset($_POST['logout'])) {
  // Xóa thông tin đăng nhập khỏi session
  session_unset();
  session_destroy();

  // Chuyển hướng người dùng đến trang đăng nhập
  header('Location: login.php');
  exit;
}