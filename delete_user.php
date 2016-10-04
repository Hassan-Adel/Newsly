<?php
session_start();
include 'class_log.php';
   require_once('config.php'); 
$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);

if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$user_id = $_POST["userid"]; 
	$in = "DELETE FROM `users` Where `UserID`='$user_id'";
    $flag = mysqli_query($con , $in);
	
   if(!$flag){ 	
            mysqli_error($con);
			}
   
	else {
	logger("Delete User","[ User ID : ".$user_id." ]");
	logger_db("Delete User","[ User ID : ".$user_id." ]");	
	echo "<script type=\"text/javascript\">   window.location = 'tables.php'; </script>";
	}

	

?>