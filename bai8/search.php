<?php
require 'dbconnect.php';
// Nếu người dùng submit form thì thực hiện
        if (isset($_REQUEST['ok'])) 
        {
            // Gán hàm addslashes để chống sql injection
            $search = addslashes($_GET['search']);
 
            // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
            if (empty($search)) {
                echo "Yeu cau nhap du lieu vao o trong";
            } 
            else
            {
                // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
                $query = "select * from players where name like '%$search%'";
 
                // Kết nối sql
                $a = new database();
                 $con = $a->connect();
                // Thực thi câu truy vấn
                $sql = mysqli_query($con, $query);
 
                // Đếm số đong trả về trong sql.
                $num = mysqli_num_rows($sql);
 
                // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
                if ($num > 0 && $search != "") 
                {
                    // Dùng $num để đếm số dòng trả về.
                    echo "$num ket qua tra ve voi tu khoa <b>$search</b>";
 
                    // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array.
                    echo '<table border="1" cellspacing="0" cellpadding="10">';
                    while ($row = mysqli_fetch_assoc($sql)) {
                        echo '<tr>';
                            echo "<td>{$row['name']}</td>";
                            echo "<td>{$row['age']}</td>";
                            echo "<td>{$row['national']}</td>";
                            echo "<td>{$row['position']}</td>";
                            echo "<td>{$row['salary']}</td>";
                        echo '</tr>';
                    }
                    echo '</table>';
                    echo "<a href='index.php'>về trang danh sách</a>";
                } 
                else {
                    echo "Khong tim thay ket qua!";
                }
            }
        }
        ?>   
    </body>
</html>