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
	$new_section_name = $_POST["newsectionname"]; 

	echo $section_id."<br>";
	echo "---------------------------------";
	
	$in = "UPDATE section SET SectionName='$new_section_name' WHERE SectionID='$section_id'";
    $flag = mysqli_query($con , $in);
	
   if(!$flag){ 	
            mysqli_error($con);
		
			}
   
	else {
	logger("Edit Section","[ New Name : ".$new_section_name." ]");
	logger_db("Edit Section","[ New Name : ".$new_section_name." ]");	
	echo "<script type=\"text/javascript\">   window.location = 'tables.php'; </script>";
	}
	
?>