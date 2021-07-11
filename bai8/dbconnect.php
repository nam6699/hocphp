<?php 
class database
{
    function connect()
    {
        //Kết nối databse
        $con = mysqli_connect('localhost', 'phpmyadmin', 'nam1', 'demo');
        return $con;
    }
    function get_all_players()
    {
        $con = $this->connect();

         //Viết câu SQL lấy tất cả dữ liệu trong bảng players
         $sql="SELECT * FROM `players` ORDER BY `id`";
         //Chạy câu SQL
         $result=mysqli_query($con,$sql);
         //Gắn dữ liệu lấy được vào mảng $data
         while ($row=mysqli_fetch_assoc($result)) {
             $data[] = $row;
         }
         return $data;

    }
   
       
    
    
}
    
?>