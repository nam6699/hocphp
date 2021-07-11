<?php
echo 'duyet cac phan tu trong mang';
$authors = array(
    array(
        'name' => 'Nguyễn Văn Cường',
        'blog' => 'freetuts.net',
        'position' => 'admin'
    ),
    array(
        'name' => 'Trương Phúc Hoài Minh',
        'blog' => 'freetuts.net',
        'position' => 'author'
    ),
    array(
        'name' => 'Hoàng Văn Tuyền',
        'blog' => 'freetuts.net',
        'position' => 'author'
    ),
    array(
        'name' => 'Nguyễn Tình',
        'blog' => 'freetuts.net',
        'position' => 'author'
    )
);

//duyet qua cac phan tu trong mang
echo "<ul>";
	foreach ($authors as $key => $value) {
		echo "<li>";
		echo "name: ".$value['name'].'<br>';
		echo "blog: ".$value['blog'].'<br>';
		echo "position: ".$value['position'].'<br>';
		echo "</li>";
	}



echo "</ul>";

//lay ten tac gia
echo 'lay ten tac gia'.'<pre>';
foreach ($authors as $key => $value) {
	echo $value['name'].'<br>';
}
//them phan tu vao mang
$new_author = [
	'name' => 'Ngo Pham Phuong Nam',
	'blog' => 'mot con vit xoe ra 2 cai canh',
	'position' => 'author'
];
$authors[] = $new_author;
echo "<ul>";
	foreach ($authors as $key => $value) {
		echo "<li>";
		echo "name: ".$value['name'].'<br>';
		echo "blog: ".$value['blog'].'<br>';
		echo "position: ".$value['position'].'<br>';
		echo "</li>";
	}



echo "</ul>";
//xoa phan tu khoi mang
echo 'xoa phan tu khoi mang';
unset($authors[0]);
echo "<ul>";
	foreach ($authors as $key => $value) {
		echo "<li>";
		echo "name: ".$value['name'].'<br>';
		echo "blog: ".$value['blog'].'<br>';
		echo "position: ".$value['position'].'<br>';
		echo "</li>";
	}



echo "</ul>";
// thay doi phan tu cua mang
echo 'thay doi phan tu cua mang'.'<br>';
$authors[4]['name'] = 'Ngo Pham Phuong Nam 2';
echo "<ul>";
	foreach ($authors as $key => $value) {
		echo "<li>";
		echo "name: ".$value['name'].'<br>';
	}



echo "</ul>";

?>
