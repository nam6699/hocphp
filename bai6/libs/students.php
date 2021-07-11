<?php
//khai bao bien ket noi toan cuc
global $conn;

//ham ket noi database
function connect_db()
{
    //goi bien toan cuc
    global $conn;
    if(!$conn){
        $conn = mysqli_connect('localhost', 'phpmyadmin', 'nam1', 'demo') or die('cant connect');
        //thiet lap font ket noi
        mysqli_set_charset($conn, 'utf8');
    }
}
//ham ngat ket noi

function disconnect_db()
{
    global $conn;

    if($conn){
        mysqli_close($conn);
    }
}

// Hàm lấy tất cả sinh viên
function get_all_students()
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
     
    // Câu truy vấn lấy tất cả sinh viên
    $sql = "select * from tb_sinhvien";
     
    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);
     
    // Mảng chứa kết quả
    $result = array();
     
    // Lặp qua từng record và đưa vào biến kết quả
    if ($query){
        while ($row = mysqli_fetch_assoc($query)){
            $result[] = $row;
        }
    }
     
    // Trả kết quả về
    return $result;
}
 
// Hàm lấy sinh viên theo ID
function get_student($student_id)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
     
    // Câu truy vấn lấy tất cả sinh viên
    $sql = "select * from tb_sinhvien where sv_id = $student_id";
     
    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);
     
    // Mảng chứa kết quả
    $result = array();
     
    // Nếu có kết quả thì đưa vào biến $result
    if (mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_assoc($query);
        $result = $row;
    }
     
    // Trả kết quả về
    return $result;
}
// Hàm sửa sinh viên
function edit_student($student_id, $student_name, $student_sex, $student_birthday)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
     
    // Chống SQL Injection
    $student_name       = addslashes($student_name);
    $student_sex        = addslashes($student_sex);
    $student_birthday   = addslashes($student_birthday);
     
    // Câu truy sửa
    $sql = "
            UPDATE tb_sinhvien SET
            sv_name = '$student_name',
            sv_sex = '$student_sex',
            sv_birthday = '$student_birthday'
            WHERE sv_id = $student_id
    ";
     
    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);
     
    return $query;
}
 
 
// Hàm thêm sinh viên
function add_student($student_name, $student_sex, $student_birthday)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
     
    // Chống SQL Injection
    $student_name = addslashes($student_name);
    $student_sex = addslashes($student_sex);
    $student_birthday = addslashes($student_birthday);
     
    // Câu truy vấn thêm
    $sql = "
            INSERT INTO tb_sinhvien(sv_name, sv_sex, sv_birthday) VALUES
            ('$student_name','$student_sex','$student_birthday')
    ";
    error_reporting(E_ALL);
    ini_set('display_errors', TRUE);
    ini_set('display_startup_errors', TRUE);
    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);
     
    return $query;
}
 
 

 
// Hàm xóa sinh viên
function delete_student($student_id)
{
    // Gọi tới biến toàn cục $conn
    global $conn;
     
    // Hàm kết nối
    connect_db();
     
    // Câu truy sửa
    $sql = "
            DELETE FROM tb_sinhvien
            WHERE sv_id = $student_id
    ";
     
    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);
     
    return $query;
}
 function register($username, $password, $email, $phone, $level ) 
{
    global $conn;
    connect_db();
    $sql = "SELECT * FROM member WHERE username = '$username' OR email = '$email'";

    $result = mysqli_query($conn, $sql);

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
          
        if (mysqli_query($conn, $sql)){
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

        global $conn;

        connect_db();
        $password = md5($password);

        $sql = "SELECT * FROM member WHERE username='$username'";

        $query = mysqli_query($conn, $sql);
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
        echo "Xin chào " . $username . ". Bạn đã đăng nhập thành công. <a href='home.php'>Về trang chủ</a>";
        die();
    }
    function search($search)
    {
        global $conn;

        connect_db();

        $sql = "select * from tb_sinhvien where sv_name like '%$search%'";

        $query = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($query);
        if ($num > 0 && $search != "") 
        {
            // Dùng $num để đếm số dòng trả về.
            echo "$num ket qua tra ve voi tu khoa <b>$search</b>";

            // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array.
            echo '<table border="1" cellspacing="0" cellpadding="10">';
            while ($row = mysqli_fetch_assoc($query)) {
                echo '<tr>';
                    echo "<td>{$row['sv_id']}</td>";
                    echo "<td>{$row['sv_name']}</td>";
                    echo "<td>{$row['sv_sex']}</td>";
                    echo "<td>{$row['sv_birthday']}</td>";
                echo '</tr>';
            }
            echo '</table>';
        } 
        else {
            echo "Khong tim thay ket qua!";
        }

    }




?>