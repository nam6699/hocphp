<?php
    require 'dbconnect.php';
       
    $id = $_GET['delete_id'];
    $a = new database();
    $con = $a->connect();
    //Viết câu SQL lấy tất cả dữ liệu trong bảng players
    $sql = "DELETE FROM `players` WHERE `id`='".$id."'";
    // Chạy câu SQL
     $result = mysqli_query($con,$sql);

?>