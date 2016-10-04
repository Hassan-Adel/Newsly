<?php
require_once('config.php'); 
$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
	if (mysqli_connect_error()) {
		die("Database connection failed: " . mysqli_connect_error());
	}
	

	
function users_number(){
global $con;
$result = mysqli_query($con,"SELECT * FROM `users`");
return mysqli_num_rows($result);
}

function admins_number(){
global $con;
$result = mysqli_query($con,"SELECT * FROM `users` Where `PrivilegeAdd`= '1' OR `PrivilegeEdit`= '1' OR `PrivilegeDelete`= '1'");
return mysqli_num_rows($result);
}

function news_number(){
global $con;
$result = mysqli_query($con,"SELECT * FROM `news`");
return mysqli_num_rows($result);
}

function sections_number(){
global $con;
$result = mysqli_query($con,"SELECT * FROM `section`");
return mysqli_num_rows($result);
}

function log_number(){
global $con;
$result = mysqli_query($con,"SELECT * FROM `log`");
$dServer = array();
while($row = mysqli_fetch_assoc($result)){
    $dServer[] = $row['UserID'];
}    
return $dServer;
}


?>