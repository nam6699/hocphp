<?php
$result = '';
if (isset($_GET['cal']))
{
    // Bước 1: Lấy thông tin
    $a = isset($_GET['a']) ? (float)trim($_GET['a']) : '';
    $b = isset($_GET['b']) ? (float)trim($_GET['b']) : '';
 
    // Bước 2: Validate thông tin và tính toán
    if ($a == ''){
        $result = 'Bạn chua nhập số a';
    }
    else if ($b == ''){
        $result = 'Bạn chưa nhập số b';
    }
    else if ($a == 0){
        $result = 'Số a phải nhập khác 0';
    }
    else {
        $result = -($b) / $a;
    }
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="with=device-width, initial-scale=1.0">
	<title>Giai phuong trinh bac nhat</title>
</head>
<body>
	<h1>Giai Phuong trinh bac nhat</h1>
	<form method="get" action="">
		<input type="number"  name="a" value="">x +
		<input type="number" name="b" value=""> = 0
		<input type="submit" name="cal">
	</form>
	<?php echo $result;?>
</body>
</html>

