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
	$news_id = $_POST["newsid"];
	$new_section_name = $_POST["newsectionname"];
	$new_section_title = $_POST["newnewstitle"];
	$new_section_description = $_POST["newnewsdescrtiption"];	
	$news_image = $_POST["imagename"];

	
	$in = "UPDATE `news` SET `SectionName`='$new_section_name', `Title` ='$new_section_title', `Description`='$new_section_description', `Image`='$news_image'
	WHERE`SectionName`='$section_id' AND `NewsID` ='$news_id'";
    $flag = mysqli_query($con , $in);
   if(!$flag){ 	
            mysqli_error($con);
		
			}
   
	else{
	logger("Edit News","[ New Section : ".$new_section_name." , New Title : ".$new_section_title." , New Description : ".$new_section_description." ]");
	logger_db("Edit News","[ New Section : ".$new_section_name." , New Title : ".$new_section_title." , New Description : ".$new_section_description." ]");		
	echo "<script type=\"text/javascript\">   window.location = 'tables.php'; </script>";
	}

?>