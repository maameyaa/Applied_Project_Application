<?php

include_once("setting.php");

$link = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

$stmt = mysqli_prepare($link,"INSERT INTO uploads(uploadname,upload) values (?,?);");

$var_filename =$_FILES['fileToUpload']['name'];

$var_data = file_get_contents($_FILES['fileToUpload']['tmp_name']);

$bind_successful=mysqli_stmt_bind_param($stmt,"sb",$var_filename,$var_data);

$send_successful=$stmt->send_long_data(1,$var_data);

$result=mysqli_stmt_execUte($stmt);

if(!$result){
	print(mysqli_error($link));
}else{
	echo "Success";
}


?>
