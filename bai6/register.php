<?php
require './libs/students.php';
if (isset($_POST['do-register']))
{
    // Lấy thông tin
    // Để an toàn thì ta dùng hàm mssql_escape_string để
    // chống hack sql injection
    $data['username']   = isset($_POST['username']) ? ($_POST['username']) : '';
    $data['password']   = isset($_POST['password']) ? md5($_POST['password']) : '';
    $data['email']      = isset($_POST['email'])    ? ($_POST['email']) : '';
    $data['phone']      = isset($_POST['phone'])    ? ($_POST['phone']) : '';
    $data['level']      = isset($_POST['level'])    ? (int)$_POST['level'] : '';
    if (!$data['username']  || !$data['password'] || !$data['email']  || !$data['phone']  || !$data['level'])
    {
        echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    register($data['username'], $data['password'], $data['email'] , $data['phone'], $data['level']);
}
      

disconnect_db();
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <form method="post" action="">
            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" value=""/></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="text" name="password" value=""/></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" value=""/></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><input type="text" name="phone" value=""/></td>
                </tr>
                <tr>
                    <td>Level</td>
                    <td>
                        <select name="level">
                            <option value="0">Thành Viên</option>
                            <option value="1">Admin</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="do-register" value="Đăng Ký"/></td>
                </tr>
            </table>
        </form>
    </body>
</html>