<?php
	$result = '';
if (isset($_POST['cal']))
{
    // Bước 1: Lấy tham số
    $a = isset($_POST['a']) ? $_POST['a'] : '';
    $b = isset($_POST['b']) ? $_POST['b'] : '';
    $c = isset($_POST['c']) ? $_POST['c'] : '';
 
    // Bước 2: Validate và tính toán
    $delta = ($b*$b) - (4*$a*$c);
 
    if ($delta < 0){
        $result = 'Phương trình vô nghiệp';
    }
    else if ($a == 0 || $b == 0 || $c == 0){
        $result = 'Phương trình vo so nghiem';
    }
    
    else if ($delta == 0){
        $result = 'Phương trình nghiệp kép x1 = x2 = ' . (-$b/2*$a);
    }
    
    else {
        $result = 'Phương trình có hai nghiệp phân biệt, x1 = ' . ((-$b + sqrt($delta))/2*$a);
        $result .= ',x2 = ' . ((-$b - sqrt($delta))/2*$a);
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Giải phương trình bậc hai</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Giải phương trình bậc hai</h1>
        <form method="post" action="">
            <input type="number" name="a" value=""/>x <sup>2</sup>
            +
            <input type="number" name="b" value=""/>x
            + 
            <input type="number"  name="c" value=""/>
            = 0
            <br/><br/>
            <input type="submit" name="cal" value="Tính" />
        </form>
        <?php echo $result; ?>
    </body>
</html>
 