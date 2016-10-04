<?php
require_once('check.php');
require_once('config.php');
include 'class_log.php';

$random=round(microtime(true));	
$target_dir = "uploads/";
$target_file = $target_dir . $random. basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
        $uploadOk = 1;
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($FileType != "png" && $FileType != "jpg" ) {
    echo "Sorry, only png, jpg files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		
		//////////////////////////////////////////////////(Add to database after success)/////////////////////////////////////////////////
		$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);

if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
		$user_id=$_SESSION['id'];
	
		$image_name=$random. basename( $_FILES["fileToUpload"]["name"]);
		$image_category = $_POST["image-category"];
		$image_title = $_POST["image-title"];
	
	$in = "INSERT INTO `gallery` (`ImageCategory`, `ImageTitle`, `ImageName`) Values ('$image_category','$image_title','$image_name');";
	 $flag = mysqli_query($con , $in);
	
	echo "<script type=\"text/javascript\">   window.location = 'form-elements.php'; </script>";
    
			
	} else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>