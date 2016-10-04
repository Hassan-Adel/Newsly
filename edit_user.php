<?php
session_start();
// Turn off error reporting
error_reporting(0);
include 'class_log.php';
   require_once('config.php'); 
$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);

if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
	$user_id = $_POST["userid"];
	$user_name = $_POST["username"];
	$user_password = $_POST["password"];
	$priv_add = $_POST['add'];
	$priv_edit  = $_POST['edit'];
	$priv_delete  = $_POST['delete'];
$in = "UPDATE `users` SET `Username`='$user_name', `Password` ='$user_password', `PrivilegeAdd`='$priv_add', `PrivilegeEdit`='$priv_edit', `PrivilegeDelete`='$priv_delete'
	WHERE `UserID` ='$user_id'";
    $flag = mysqli_query($con , $in);
   if(!$flag){ 	
            mysqli_error($con);
		
			}
   
	else{
	logger("Edit Users","[ New Username : ".$user_name." , New Password : ".$user_password." , New PrivilegeAdd : ".$priv_add.", New PrivilegeEdit : ".$priv_edit.", New PrivilegeDelete : ".$priv_delete." ]");
	logger_db("Edit Users","[ New Username : ".$user_name." , New Password : ".$user_password." , New PrivilegeAdd : ".$priv_add.", New PrivilegeEdit : ".$priv_edit.", New PrivilegeDelete : ".$priv_delete." ]");		
	echo "<script type=\"text/javascript\">   window.location = 'tables.php'; </script>";
	}

?>