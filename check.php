<?php
session_start();
if($_SESSION['id']==""){
echo"NOT FOUND";
header("Location:login.php");

}
//else {echo $_SESSION['id'];unset($_SESSION['id']);}

?>