<?php
require ('./libs/students.php');
if (isset($_REQUEST['ok'])) {
    $search = addslashes($_GET['search']);
    if (empty($search)) {
        echo "Yeu cau nhap du lieu vao o trong";
    } else {
        search($search);
    }
}

?>

<html>
    <head>
        <title>Demo Search Basic by</title>
    </head>
    <body>
        <div align="center">
            <form action="search.php" method="get">
                Search: <input type="text" name="search" />
                <input type="submit" name="ok" value="search" />
            </form>
        </div>
        <?php
         
        // Phần code PHP xử lý tìm kiếm
         
        ?>
    </body>
</html>