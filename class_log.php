<?php

function logger($action,$action_variable){
$myFile = "LogFile.txt";
$fh = fopen($myFile, 'a') or die("can't open file");
$t=time();
//$time = @date('[d/M/Y:H:i:s]');
$stringData = "UserID : ".$_SESSION['id']." | Username : ".$_SESSION['username']." | Action : ".$action." | Action Variable: ".$action_variable." | Time: ".date("Y-m-d",$t) ." ". date("h:i:sa")."\n";
fwrite($fh, $stringData);
fclose($fh);
}

function logger_db($action,$action_variable){

require_once('config.php'); 
$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
	if (mysqli_connect_error()) {
		die("Database connection failed: " . mysqli_connect_error());
	}

	$in = "INSERT INTO `log` (`UserID`, `Username`, `Action`, `ActionVariable`) Values ('$_SESSION[id]','$_SESSION[username]','$action','$action_variable');";
    $flag = mysqli_query($con , $in);
   if(!$flag){ 	
            mysqli_error($con);
		}
}






function upload_files_no_db($fileToUpload){

//$random=round(microtime(true));	
$target_dir = "uploads/";
$target_file = $target_dir .'logo.png';
$uploadOk = 1;
$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
        $uploadOk = 1;
// Check if file already exists
/*if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}*/
// Check file size
if ($fileToUpload["size"] > 500000) {
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
    if (move_uploaded_file($fileToUpload["tmp_name"], $target_file)) {}
       else {
        echo "Sorry, there was an error uploading your file.";
    } 
}

}





function upload_files($fileToUpload){

$random=round(microtime(true));	
$target_dir = "uploads/";
$target_file = $target_dir . $random. basename($fileToUpload["name"]);
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
if ($fileToUpload["size"] > 500000) {
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
    if (move_uploaded_file($fileToUpload["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		
		//////////////////////////////////////////////////(Add to database after success)/////////////////////////////////////////////////
		$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);

if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
		$user_id=$_SESSION['id'];
	
		$image_name=$random. basename( $fileToUpload["name"]);
	
	//$in = "INSERT INTO `Images` (`UserID`, `ImageName`) Values ('$user_id','$image_name');";
	//$in = "UPDATE news SET Image='$image_name' WHERE Email='$email' ;";
    //$flag = mysqli_query($con , $in);
	
	$in = "INSERT INTO `news` (`SectionName`, `Title`, `Description`, `Image`) Values ($_POST[parent_selection],$_POST[newstitle],$_POST[newsdescrtiption],'$image_name');";
    $flag = mysqli_query($con , $in);
   if(!$flag){ 	
            mysqli_error($con);
			
			}else echo "<script type=\"text/javascript\">   window.location = 'dash.php'; </script>"; 
			
	} else {
        echo "Sorry, there was an error uploading your file.";
    } 
}

}

?>