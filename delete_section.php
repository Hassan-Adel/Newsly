<?php
session_start();
include 'class_log.php';
   require_once('config.php'); 
$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);

if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$section_id = $_POST["sectionid"]; 
	
	$inn = "DELETE FROM `news` Where `SectionName`='$section_id'";
    $flagg = mysqli_query($con , $inn);
	$in = "DELETE FROM `section` Where `SectionID`='$section_id'";
    $flag = mysqli_query($con , $in);
	
   if(!$flag && !$flagg){ 	
            mysqli_error($con);
		
			}
   
	else {
	logger("Delete Section","[ Section ID : ".$section_id." ]");
	logger_db("Delete Section","[ Section ID : ".$section_id." ]");	
	echo "<script type=\"text/javascript\">   window.location = 'tables.php'; </script>";
	}

	

?>