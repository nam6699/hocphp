<?php
$conn = mysqli_connect('localhost', 'phpmyadmin', 'nam1', 'demo') or die ('Không thể kết nối tới database');
//
$sql = 'SELECT * FROM customer';

$result = mysqli_query($conn, $sql);

if (!$result){
    die ('Câu truy vấn bị sai');
}
while ($row = mysqli_fetch_assoc($result)){
    echo '<pre>';
    var_dump($row);
}

mysqli_close($conn);

?>