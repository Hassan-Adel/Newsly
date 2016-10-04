<!DOCTYPE html>
<?php 
//session_start();
require_once('check.php');
include 'class_log.php';
?>
<html>
<script>
function isAlphaOrParen(str) {
  return /^[a-zA-Z ]+$/.test(str);
}
function validateAddSection() {
    var a = document.forms["form1"]["firstname"].value;
    if (a == null || a == "") {
        alert("Section name must be filled out");
        return false;
    }
	if(!isAlphaOrParen(a))return false;

	return true;
}

////////////////////////////////////////////////////////////////////////

var _validFileExtensions = [".jpeg", ".png", ".jpg"];    
function Validate(oForm) {
    var arrInputs = oForm.getElementsByTagName("input");
    for (var i = 0; i < arrInputs.length; i++) {
        var oInput = arrInputs[i];
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }
                
                if (!blnValid) {
                    alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                    return false;
                }
            }
        }
    }
  
    return true;
}


</script>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="images/favicon_1.ico">

        <title>Moltran - Responsive Admin Dashboard Template</title>

        <!-- Base Css Files -->
        <link href="css/bootstrap.min.css" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
        <link href="css/material-design-iconic-font.min.css" rel="stylesheet">

        <!-- animate css -->
        <link href="css/animate.css" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="css/waves-effect.css" rel="stylesheet">
		
		<!-- sweet alerts -->
        <link href="assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">
		
        <!-- Custom Files -->
        <link href="css/helper.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="js/modernizr.min.js"></script>
        
		<style>
    .black_overlay{
        display: none;
        position: fixed;
        top: 0%;
        left: 0%;
        width: 100%;
        height: 100%;
        background-color: black;
        z-index:1001;
        -moz-opacity: 0.8;
        opacity:.80;
        filter: alpha(opacity=80);
    }
    .white_content {
        display: none;
        position: fixed;
        top: 12.5%;
        left: 15%;
        width: 70%;
        height: 75%;
        padding: 16px;
        border: 10px solid silver;
        background-color: white;
        z-index:1002;
        overflow: auto;
    }
</style>
		
    </head>



    <body class="fixed-left">
         
               <div id="light" class="white_content">
            <div style="float:left;">  
			
<div style="margin:10px;" id="innercontent"></div>
			

             </div>
             <img >
                <div style="float:right; margin-top:15px; clear:both; ">
			
<!---------------------------------------------------------------------------------------------->			
<form onsubmit="return Validate(this);" action="upload.php" method="post" enctype="multipart/form-data">
    Add to library:
	<select style="width:90px; margin-bottom=5px; " class="form-control" name="image-category" >
	<option value="all">All</option>
	<option value="actor">Actor</option>
	<option value="politician">Politician</option>
	<option value="places">Places</option>
	</select>
	<input type="text" name="image-title" class="form-control" placeholder="Title">
	<div class="fileUpload btn btn-purple waves-effect waves-light">
                                            <span><i class="ion-upload m-r-5"></i>Upload</span>
                                            <input type="file" class="upload"name="fileToUpload" id="fileToUpload">
                                        </div>
    <!--<input type="file" class="upload" name="fileToUpload" id="fileToUpload">--> 
    <button style="margin-top:5px;" type="submit" value="Upload File" name="submit" class="btn btn-warning waves-effect waves-light m-b-5"> <i class="fa fa-rocket"></i> <span>Confirm</span></button>
</form>
<!---------------------------------------------------------------------------------------------->



             <Button style="margin-top:5px;" class="fileUpload btn btn-danger waves-effect waves-light" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">Close
                </Button>
             </div>
		

		
<!---------------------------------------------------------------------------------------------->
			<div style="float:left;">  

    Search library:
	<select style="width:90px; margin-bottom=5px; " class="form-control" id="categoryofimage" name="image-category" >
	<option value="all">All</option>
	<option value="actor">Actor</option>
	<option value="politician">Politician</option>
	<option value="places">Places</option>
	</select>
	<input type="text" name="image-title" class="form-control" id="titleofimage" placeholder="Title">

	<a href="image-loader.php" style="margin-top:5px;" class="btn btn-primary waves-effect waves-light m-b-5 innerloader" ><i class="fa fa-rocket"></i> <span>Click!</span></a>
	
</div>
<!---------------------------------------------------------------------------------------------->
		
            
        </div>
   
    <div id="fade" class="black_overlay"></div>
   

        <!-- Begin page -->
        <div id="wrapper">
        
            <!-- Top Bar Start -->
            <div class="topbar">
               <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
					<!--style="float: left; clear: none;margin-left:20px;"-->
                        <a  href="dash.php" class="logo"><i><img src="uploads/logo.png" style="width:40px;height:40px;" alt="logo-img" ></i> <span>Newsly </span></a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                            <form class="navbar-form pull-left" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control search-bar" placeholder="Type here for search...">
                                </div>
                                <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                            </form>

                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="dropdown hidden-xs">
                                    <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                        <i class="md md-notifications"></i> <span class="badge badge-xs badge-danger">3</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-lg">
                                        <li class="text-center notifi-title">Notification</li>
                                        <li class="list-group">
                                           <!-- list item-->
                                           <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    <em class="fa fa-user-plus fa-2x text-info"></em>
                                                 </div>
                                                 <div class="media-body clearfix">
                                                    <div class="media-heading">New user registered</div>
                                                    <p class="m-0">
                                                       <small>You have 10 unread messages</small>
                                                    </p>
                                                 </div>
                                              </div>
                                           </a>
                                           <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    <em class="fa fa-diamond fa-2x text-primary"></em>
                                                 </div>
                                                 <div class="media-body clearfix">
                                                    <div class="media-heading">New settings</div>
                                                    <p class="m-0">
                                                       <small>There are new settings available</small>
                                                    </p>
                                                 </div>
                                              </div>
                                            </a>
                                            <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    <em class="fa fa-bell-o fa-2x text-danger"></em>
                                                 </div>
                                                 <div class="media-body clearfix">
                                                    <div class="media-heading">Updates</div>
                                                    <p class="m-0">
                                                       <small>There are
                                                          <span class="text-primary">2</span> new updates available</small>
                                                    </p>
                                                 </div>
                                              </div>
                                            </a>
                                           <!-- last list item -->
                                            <a href="javascript:void(0);" class="list-group-item">
                                              <small>See all notifications</small>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" class="right-bar-toggle waves-effect waves-light"><i class="md md-chat"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="images/avatar-1.jpg" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile</a></li>
                                        <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                                        <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                                        <li><a href="logout.php"><i class="md md-settings-power"></i> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->

<!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                            <img src="images/users/avatar-1.jpg" alt="" class="thumb-md img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION['username']; ?><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                                    <li><a href="logout.php"><i class="md md-settings-power"></i> Logout</a></li>
                                </ul>
                            </div>
                            
                            <p class="text-muted m-0">Administrator</p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            
                             <li>
                            <a href="dash.php" class="waves-effect"><i class="md md-home"></i><span>Home </span></a>
                        </li>
						
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-now-widgets"></i><span>Add Forms </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
								 <?php if($_SESSION['privilege_add']=="1"){ ?>
                                    <li><a href="form-elements.php">Add News/Sections</a></li>
									<?php } 
									?>
                                    <li><a href="form-validation.php">Add User</a></li>
                                    
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-view-list"></i><span>News/Logs Tables </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    
                                    <li class="active"><a href="tables.php">News/Sections</a></li>
                                    <?php if($_SESSION['privilege_add']=="1" || $_SESSION['privilege_edit']=="1" || $_SESSION['privilege_delete']=="1"){ ?>
                                    <li><a href="tables-editable.php">Users' Log</a></li>
									<?php } ?>
                                   
                                </ul>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End --> 


            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">General elements</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Moltran</a></li>
                                    <li><a href="#">Forms</a></li>
                                    <li class="active">General elements</li>
                                </ol>
                            </div>
                        </div>


                        <div class="row">
                            <!-- Basic example -->
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Add Section</h3></div>
                                    <div class="panel-body">
                                        <form method ="post" role="form" onsubmit="return validateAddSection()">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Section name:</label>
                                                <input type="text" name="firstname" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                                            </div>
                                            <button type="submit" name = "AddSection" class="btn btn-info waves-effect waves-light">Add</button>
                                        </form>
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->
                            
                            <!-- Horizontal form -->
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Add News</h3></div>
                                    <div class="panel-body">
                                        <form onsubmit="return Validate(this);" method="post" enctype="multipart/form-data" class="form-horizontal" role="form" >
										<div class="form-group">
                                                <label class="col-sm-2 control-label">Section</label>
                                                <div class="col-sm-10">
                                                    
             <?php
            require_once('config.php'); 
			
$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
if (mysqli_connect_errno($con))echo "Failed to connect to MySQL: " . mysqli_connect_error();
$query = mysqli_query($con,"Select * FROM `section`"); // Run your query
echo '<select class="form-control" name="parent_selection" >'; // Open your drop down box

// Loop through the query results, outputing the options one by one
while ($row = mysqli_fetch_array($query)) {
   echo '<option value="'.$row['SectionID'].'">'.$row['SectionName'].'</option>';
}

echo '</select>';// Close your drop down box
                
            ?>
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="example-email">News Title</label>
                                                <div class="col-md-10">
                                                    <input type="text" id="example-email" name="newstitle" class="form-control" placeholder="Title">
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                    <label for="ccomment" class="control-label col-lg-2">Description</label>
                                                    <div class="col-lg-10">
                                                        <textarea class="form-control " placeholder="Description" id="ccomment" name="newsdescrtiption" required="" aria-required="true"></textarea>
                                                    </div>
                                                </div>
												
											<!--<div class="form-group ">
                                                <label for="ccomment" class="control-label col-lg-2">Select file to upload:</label>
                                                <div class="col-lg-10">
                                                   <input type="file" name="fileToUpload" id="fileToUpload">
                                                </div>
                                            </div> -->
                                            <div class="form-group m-b-0">
                                                <div class="col-sm-offset-3 col-sm-9">
												
												
												 <div id="pic-name"></div>
                                                   <Button  type="button" class="btn btn-purple waves-effect waves-light" onclick = "open_media()">Open Gallery</Button>
                                            
												
												
                                                  <button name = "AddNews" class="btn btn-info waves-effect waves-light">Add</button>
												  
                                                </div>
                                            </div>
                                        </form>
										<!--<button class="btn btn-info waves-effect waves-light btn-sm" id="sa-success">Click me</button>-->
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->

                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    2015 © Moltran.
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            <div class="side-bar right-bar nicescroll">
                <h4 class="text-center">Chat</h4>
                <div class="contact-list nicescroll">
                    <ul class="list-group contacts-list">
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-1.jpg" alt="">
                                </div>
                                <span class="name">Chadengle</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-2.jpg" alt="">
                                </div>
                                <span class="name">Tomaslau</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-3.jpg" alt="">
                                </div>
                                <span class="name">Stillnotdavid</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-4.jpg" alt="">
                                </div>
                                <span class="name">Kurafire</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-5.jpg" alt="">
                                </div>
                                <span class="name">Shahedk</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-6.jpg" alt="">
                                </div>
                                <span class="name">Adhamdannaway</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-7.jpg" alt="">
                                </div>
                                <span class="name">Ok</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-8.jpg" alt="">
                                </div>
                                <span class="name">Arashasghari</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-9.jpg" alt="">
                                </div>
                                <span class="name">Joshaustin</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-10.jpg" alt="">
                                </div>
                                <span class="name">Sortino</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                    </ul>  
                </div>
            </div>
            <!-- /Right-bar -->


        </div>
        <!-- END wrapper -->
    
        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/waves.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="js/jquery.scrollTo.min.js"></script>
        <script src="assets/jquery-detectmobile/detect.js"></script>
        <script src="assets/fastclick/fastclick.js"></script>
        <script src="assets/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="assets/jquery-blockui/jquery.blockUI.js"></script>


        <script src="assets/sweet-alert/sweet-alert.min.js"></script>
        <script src="assets/sweet-alert/sweet-alert.init.js"></script>


		
        <!-- CUSTOM JS -->
        <script src="js/jquery.app.js"></script>
		
		
			
<script>
var container;
        $( document ).ready(function() {
           $('.picpick').click(function(){
                name = $(this).attr('name');
                  //$('#pic-name').html(name);
					$('#pic-name').html('<input style="margin:5px;" type="text" class="form-control" name="imagename" value="'+name+'" readonly > ');
        });
           
		   
		   $('.innerloader').click(function(){
		   
		   var e = document.getElementById("categoryofimage");
		   var categoryvalue = e.options[e.selectedIndex].value;
		   
		   
			var titlevaluetest = document.getElementById("titleofimage").value;
		   //'+titlevalue+'
	//var page = $(this).attr('href')+'?category='+categoryvalue+'&title=sasasas';
	var page = $(this).attr('href')+'?category='+categoryvalue+'&title='+titlevaluetest+'';
	$("#innercontent").load(page);
	return false;
});
		   
		   
        });
		
	
		function close_media() {
                document.getElementById('light').style.display='none';
                document.getElementById('fade').style.display='none'
			}
            function open_media(){
                document.getElementById('light').style.display='block';
                document.getElementById('fade').style.display='block'
            }

		function set_media_var(x) {
                container=x;
            }

			
			/*
			
	   $('.innerloader').click(function(){
	//var page = $(this).attr('href');
	var loadPHP = "image-loader.php";  
	$('#innercontent').append( $('<div />').load(loadPHP) );
	return false;
});
			*/
			
		
</script>	
		
		
	
	</body>
	
	
	
	
<!--///////////////////////////////PHP///////////////////////////-->

<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$DP = "news_db";
	$conn = new mysqli($servername, $username, $password,$DP);
	
	if (mysqli_connect_error()) {
		die("Database connection failed: " . mysqli_connect_error());
	}
	
 if(isset($_POST['AddSection'])){	
	$section_name = $_POST["firstname"]; 

	logger("Add section","Name : ".$section_name);
	logger_db("Add section","Name : ".$section_name);
	
	$in = "INSERT INTO `section`(`SectionName`) VALUES('$section_name')";
    $flag = mysqli_query($conn , $in);
   if(!$flag){ 	
            mysqli_error($conn);
			echo '<script language="javascript">';
			echo 'alert("This name has been used before")';
			echo '</script>';
			}
   
	else  
	echo "<script type=\"text/javascript\">   window.location = 'dash.php'; </script>";
	
}

else if(isset($_POST['AddNews'])){	

	$section_name = $_POST["parent_selection"];
	$section_title = $_POST["newstitle"];
	$section_description = $_POST["newsdescrtiption"];
	$news_image = $_POST["imagename"];
	
	logger("Add News","[ Section : ".$section_name." , Title : ".$section_title." , Description : ".$section_description." ]");
	logger_db("Add News","[ Section : ".$section_name." , Title : ".$section_title." , Description : ".$section_description." ]");
	
	$in = "INSERT INTO `news` (`SectionName`, `Title`, `Description`, `Image`) Values ('$section_name','$section_title','$section_description','$news_image');";
    $flag = mysqli_query($con , $in);
   if(!$flag){ 	
            mysqli_error($con);
			
			}else echo "<script type=\"text/javascript\">   window.location = 'dash.php'; </script>";
	}

//propaganda

?>


	
	
</html>