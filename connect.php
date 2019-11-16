<?php
	DEFINE ('HOST', 'localhost');
	DEFINE ('DB_USER', 'root');
	DEFINE ('DB_PASSWD', '');
	DEFINE ('DB_NAME', 'sinhvien');

	$conn = @mysqli_connect(HOST, DB_USER, DB_PASSWD, DB_NAME) or die ('Không
        thể kết nối tới database'. mysqli_connect_error());

    $conn->set_charset("utf8");//Set UTF-8
?>