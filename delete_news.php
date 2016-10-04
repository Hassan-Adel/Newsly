<?php
session_start();
include 'class_log.php';
   require_once('config.php'); 
$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);

if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

	$news_id = $_POST["newsid"];
	

	
	$in = "DELETE FROM `news` Where `NewsID` ='$news_id'";
    $flag = mysqli_query($con , $in);
   if(!$flag){ 	
            mysqli_error($con);
		
			}
   
	else  {
	logger("Delete News","[ News ID : ".$news_id." ]");
	logger_db("Delete News","[ News ID : ".$news_id." ]");	
	echo "<script type=\"text/javascript\">   window.location = 'tables.php'; </script>";
	}
	
?>