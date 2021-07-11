<?php
require 'dbconnect.php';
function register($username, $password, $email, $phone, $level ) 
    {
        $a = new database();
        $con = $a->connect();
        
        $sql = "SELECT * FROM member WHERE username = '$username' OR email = '$email'";
    
        $result = mysqli_query($con, $sql);
    
        if (mysqli_num_rows($result) == 0)
        {
            // Sử dụng javascript để thông báo
            echo '<script language="javascript">alert("Thông tin đăng nhập bị sai"); window.location="register.php";</script>';
              
            // Dừng chương trình
            die ();
        }
        else {
            // Ngược lại thì thêm bình thường
            $sql = "INSERT INTO member (username, password, email, phone, level) VALUES ('$username','$password','$email','$phone', '$level')";
              
            if (mysqli_query($con, $sql)){
                echo '<script language="javascript">alert("Đăng ký thành công"); window.location="register.php";</script>';
            }
            else {
                echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="register.php";</script>';
            }
        }
    }
        function Login($username, $password)
        {
            
            session_start();
    
            $a = new database();
            $con = $a->connect();
            $password = md5($password);
    
            $sql = "SELECT * FROM member WHERE username='$username'";
    
            $query = mysqli_query($con, $sql);
            if (mysqli_num_rows($query) == 0) {
                echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
                exit;
            }
             
            //Lấy mật khẩu trong database ra
            $row = mysqli_fetch_array($query);
           
             
            //So sánh 2 mật khẩu có trùng khớp hay không
            if ($password != $row['password']) {
                echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
                exit;
            }
             
            //Lưu tên đăng nhập
            $_SESSION['username'] = $username;
            echo "Xin chào " . $username . ". Bạn đã đăng nhập thành công. <a href='index.php'>Về trang chủ</a>";
            die();
        }