<?php
require ('user.php');
if (isset($_POST['dangnhap'])) 
{
   
    //Lấy dữ liệu nhập vào
    $username = isset($_POST['txtUsername']) ? ($_POST['txtUsername']) : '';
    $password = isset($_POST['txtPassword']) ? ($_POST['txtPassword']) : '';
     
    //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
    if (!$username || !$password) {
        echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    login($username, $password);

    disconnect_db();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <form action='login.php' method='post'>
            <table cellpadding='0' cellspacing='0' border='1'>
                <tr>
                    <td>
                        Tên đăng nhập :
                    </td>
                    <td>
                        <input type='text' name='txtUsername' />
                    </td>
                </tr>
                <tr>
                    <td>
                        Mật khẩu :
                    </td>
                    <td>
                        <input type='password' name='txtPassword' />
                    </td>
                </tr>
            </table>
            <input type='submit' name = 'dangnhap' value='Đăng nhập' />
            <a href='register.php' title='Đăng ký'>Đăng ký</a>
        </form>
    </body>
</html>