<!DOCTYPE html>
<?php
session_start();
include_once('simple_html_dom.php');
require_once('config.php'); 
$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);

if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>
<html>
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
        z-index:999999;
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
					<!--style="float: left; clear: none;margin-left:20px;"<a  href="dash.php" class="logo"><i><div style=" height: 40px; width: 80px; float:left; margin-left:30px;"><img src="uploads/logo.png" style="max-width: 100%;max-height: 100%;" alt="logo-img" ></div></i> <span>Newsly </span></a>-->
                        <!--<a  href="dash.php" class="logo"><i><img src="uploads/logo.png" style="width:65px;height:40px;" alt="logo-img" ></i> <span>Newsly </span></a>-->
                    <a  href="dash.php" class="logo"><i><div style=" height: 40px; width: 80px; float:left; margin-left:55px;"><img src="uploads/logo.png" style="max-width: 100%;max-height: 100%;" alt="logo-img" ></div></i> <span>Newsly </span></a>
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
                                <h4 class="pull-left page-title">Basic Tables</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Moltran</a></li>
                                    <li><a href="#">Data Tables</a></li>
                                    <li class="active">Basic Tables</li>
                                </ol>
                            </div>
                        </div>
<!--------------------------------------------------------------------------------------------------------------------------------------------------------->

<!--<button type="button" class="btn btn-purple btn-custom waves-effect waves-light m-b-5">Add News</button>

<!--------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------------------------------------------->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">News Table</h3> <?php if($_SESSION['privilege_add']=="1"){
																											?>
										<a href="form-elements.php" style="float:right; margin-top:-32px;" class="btn btn-purple btn-custom waves-effect waves-light m-b-5"> <i class="fa fa-plus"></i>  News</a>
                                    <?php } ?>
									</div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Section Name</th>
                                                                <th>Title</th>
                                                                <th>Description</th>
                                                                <!--<th>Delete</th>-->
                                                                <!--<th>Edit</th>-->
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                          <?php

$all="Select * FROM `news` ";
  $result = mysqli_query($con,$all);
	if (mysqli_num_rows($result) > 0) {
		$count=1;
    while($row = mysqli_fetch_array($result)) {
	
	$sql="SELECT SectionName FROM `section` WHERE SectionID='$row[SectionName]' limit 1";
	$resultx = mysqli_query($con, $sql);
	$value=mysqli_fetch_object($resultx);
	$section_name = $value->SectionName;
	?>
			<tr>
			<td>
	<?php echo "#".$count; ?>
	</td>
			<td>
	<?php echo $section_name; ?>
	</td>
	
	<td>
	<?php echo $row["Title"]; ?>
	</td>

	<td>
	<?php echo $row["Description"]; ?>
	</td>
	
	<td>
	 <img src="uploads/<?php echo $row["Image"];?>" <?php if($row["Image"]=="none" || $row["Image"]==""){echo "hidden=\"hidden\"";} ?> width="50px" height="50px" >
	</td>
	
	
	 <?php if($_SESSION['privilege_delete']=="1"){ ?>
	<td>
	<span style="float:left;margin:3px;">
	<form method = "post" name="deletenews"  onsubmit="return confirm('Are you sure?')" action = "delete_news.php" >
	<input type="hidden" name="newsid" value="<?php echo $row["NewsID"]?>">
	<button  type="submit" class="btn btn-default waves-effect waves-light btn-xs m-b-5" name = "Delete" >Delete</button>
   </form>
   </span>
   </td>
   <?php } ?>
   
	
	
	<?php if($_SESSION['privilege_edit']=="1"){ ?>
	<td>
	<span style="float:left;margin:3px;">
	<a href="#" secname="<?php echo $row["SectionName"]?>"  newsid="<?php echo $row["NewsID"]?>" newstitle="<?php echo $row["Title"]?>" newsdesc="<?php echo $row["Description"]?>" newsid="<?php echo $row["NewsID"]?>" newsimage="<?php echo $row["Image"];?>" class="btn btn-primary waves-effect waves-light btn-xs m-b-5 editnews"  data-toggle="modal" data-target="#edit-news"  >Edit</a>
	<span>
	</td>
	<?php } ?>
	
    
	</tr>
 
   <?php
   $count+=1;
   }
		?>
                                                        </tbody>
                                                    </table>
													<?php
	}
 else {
    echo "0 section results";
}
?>
                                                </div>

												
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End row -->
					
<!--------------------------------------------------------------------------------------------------------------------------------------------------------->

<!--<button type="button" class="btn btn-purple btn-custom waves-effect waves-light m-b-5">Add Section</button>

<!--------------------------------------------------------------------------------------------------------------------------------------------------------->

<div class="col-md-6">
<div style="" class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Sections Table</h3> <?php if($_SESSION['privilege_add']=="1"){
?>
										<a href="form-elements.php" style="float:right; margin-top:-32px;" class="btn btn-purple btn-custom waves-effect waves-light m-b-5"> <i class="fa fa-plus"></i>  Section</a>
                                    <?php } ?>
									
									</div>
                                    <div  class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Section Name</th>
                                                                <!--<th>Delete</th>-->
                                                                <!--<th>Edit</th>-->
                                                            </tr>
                                                        </thead>
                                                        <tbody>
<tr>

<?php
$all="Select * FROM `section` ";
  $result = mysqli_query($con,$all);
	
	if (mysqli_num_rows($result) > 0) {
	$count=1;
    while($row = mysqli_fetch_array($result)) {
	
	
			?><html>
			
			<tr>
			
			
			<td>
			<?php echo "#".$count; ?>
			
			</td>
			
			<td>
			<?php echo "#".$row["SectionName"]; ?>
			
			</td>
			
			
			<?php if($_SESSION['privilege_delete']=="1"){ ?>
	<td>
	<span style="float:left;margin:3px;">	
	<form method = "post" onsubmit="return confirm('Are you sure?')" action= "delete_section.php" >
	<input type="hidden" name="sectionid" value="<?php echo $row["SectionID"]?>">
    <button type="submit" class="btn btn-default waves-effect waves-light btn-xs m-b-5" name = "delete" >Delete</button>
    </form>
	</span>
	</td>
	<?php } ?>
	
	
			
			
			<?php if($_SESSION['privilege_edit']=="1"){ ?>
	<td>
	<span style="float:left;margin:3px;">
	<a href="#"  sec="<?php echo $row["SectionID"]?>" class="btn btn-primary waves-effect waves-light btn-xs m-b-5 createnew"  data-toggle="modal" data-target="#add-category"  >Edit</a>
	</span>
	</td>
	
	<?php } ?>
	
	</tr>
	
 <?php
	$count+=1;
	}
	
	?>
                                                        </tbody>
                                                    </table>
													<?php
	}
 else {
    echo "0 section results";
}
?>
                                                </div>

												
                                            </div>
                                        </div>
                                    </div>
                                </div>
								</div>
								
								
<!--------------------------------------------------------------------(Users Table)--------------------------------------------------------------------------->
								
								
								<div class="col-md-6">
								<div style="" class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Users Table</h3> <?php if($_SESSION['privilege_add']=="1"){
?>
										<a href="form-validation.php" style="float:right; margin-top:-32px;" class="btn btn-purple btn-custom waves-effect waves-light m-b-5"> <i class="fa fa-plus"></i>  User</a>
                                    <?php } ?>
									
									</div>
                                    <div  class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Username</th>
                                                                <th>Password</th>
																<th>(A)</th>
																<th>(E)</th>
																<th>(D)</th>
                                                                <!--<th>Delete</th>-->
                                                                <!--<th>Edit</th>-->
                                                            </tr>
                                                        </thead>
                                                        <tbody>
<tr>

<?php
$all="Select * FROM `users` ";
  $result = mysqli_query($con,$all);
	
	if (mysqli_num_rows($result) > 0) {
	$count=1;
    while($row = mysqli_fetch_array($result)) {
	
	
			?><html>
			
			<tr>
			
			
			<td>
			<?php echo $row["Username"]; ?>
			</td>
			
			<td>
			<?php echo $row["Password"]; ?>
			</td>
			
			<td>
			<?php echo $row["PrivilegeAdd"]; ?>
			</td>
			
			<td>
			<?php echo $row["PrivilegeEdit"]; ?>
			</td>
			
			<td>
			<?php echo $row["PrivilegeDelete"]; ?>
			</td>
			
			
			<?php if($_SESSION['privilege_delete']=="1"){ ?>
	<td>
	<span style="float:left;margin:3px;">	
	<form method = "post" onsubmit="return confirm('Are you sure?')" action= "delete_user.php" >
	<input type="hidden" name="userid" value="<?php echo $row["UserID"]?>">
    <button type="submit" class="btn btn-default waves-effect waves-light btn-xs m-b-5" name = "delete" >Delete</button>
    </form>
	</span>
	</td>
	<?php } ?>
	
	
			
			
			<?php if($_SESSION['privilege_edit']=="1"){ ?>
	<td>
	<span style="float:left;margin:3px;">
	<a href="#" userid="<?php echo $row["UserID"]?>"  username="<?php echo $row["Username"]?>" userpassword="<?php echo $row["Password"]?>" privadd="<?php echo $row["PrivilegeAdd"]?>" privedit="<?php echo $row["PrivilegeEdit"]?>" privdelete="<?php echo $row["PrivilegeDelete"];?>" class="btn btn-primary waves-effect waves-light btn-xs m-b-5 editusers"  data-toggle="modal" data-target="#edit-User"  >Edit</a>
	<span>
	</td>
	<?php } ?>
	
	</tr>
	
 <?php
	$count+=1;
	}
	
	?>
                                                        </tbody>
                                                    </table>
													<?php
	}
 else {
    echo "0 section results";
}
?>
                                                </div>

												
                                            </div>
                                        </div>
                                    </div>
                                </div>
								</div>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------>
								
                            </div>
                        </div> <!-- End row -->

<!---
<?php
/*
 $html = str_get_html("<div id='mod-din' ></div>");

$e = $html->find("div", 0);

echo $e->tag; // Returns: " div"
echo $e->outertext; // Returns: " <div>foo <b>bar</b></div>"
echo $e->innertext; // Returns: " foo <b>bar</b>"
echo $e->plaintext; // Returns: " foo bar"
*/

/*
$html = str_get_html("<div id='mod-din' ></div>");
														echo $html->find("div", 0);
														echo $html->save();
														$e =$html;
														echo $e;
														$html = str_get_html("<div id='mod-sec' ></div>");
														/$ee = $html->find("div", 0);
														echo $e->outertext.'<br>'; // Returns: " <div>foo <b>bar</b></div>"
														echo $ee->outertext;
														
*/

?>
       
--->









								
								
								
								
								<!-- BEGIN MODAL -->
								
								
								
								
								
								
																<!-- Modal Edit User -->
                                <div class="12 modal fade" id="edit-User">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title"><strong>Edit</strong> User</h4>
                                            </div>
                                            <div class="modal-body">
                                                
														
														
											<form method ="post" class="form-horizontal" action= "edit_user.php" role="form">
										<div class="form-group">
										
										
														<!----------------------------------------->
														<div id='mod-user-input' ></div>
														<!----------------------------------------->
										
                                                </div>
                                            <div class="form-group">
                                                <div class="col-md-10">
													<div id='mod-news-input1' ></div>
											   </div>
                                            </div>
                                            <div class="form-group ">
                                                   
                                                </div>
											
											<div class="modal-footer">
                                                <button type="submit" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                <button type="submit" name = "EditSection" class="btn btn-danger waves-effect waves-light save-category" >Save</button>
                                            </div>
											
                                        </form>
                                            
                                        </div>
                                    </div>
                                  </div>
								</div>
                                <!-- END MODAL -->
								
								
								
								
								
								
								
								
 <!-- Modal Edit Section -->
                                <div class="modal fade" id="add-category">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title"><strong>Add</strong> a category</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form method ="post" name="form1" action= "edit_section.php" >
                                                    <div class="row">
                                                        
														<div id='mod-din' ></div>
														
														 <div class="col-md-6">
														    <label class="control-label" >New Section name:</label>
															<input class="form-control form-white"  placeholder="Enter name" type="text" name="newsectionname" class="textfield">
                                                            
                                                        </div>
                                                    </div>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                <button type="submit" name = "EditSection" class="btn btn-danger waves-effect waves-light save-category" >Save</button>
                                            </div>
											</form>
                                        </div>
                                    </div>
                                </div>
                                <!-- END MODAL -->










<!-- BEGIN MODAL -->
 <!-- Modal Edit News -->
                                <div class="12 modal fade" id="edit-news">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title"><strong>Edit</strong> section</h4>
                                            </div>
                                            <div class="modal-body">
                                                
														
														
											<form method ="post" class="form-horizontal" action= "edit_news.php" role="form">
										<div class="form-group">
										
										
														<!----------------------------------------->
														<div id='mod-news-din' ></div>
														<div id='mod-news-sec' ></div>
														<!----------------------------------------->
										
                                                <label class="col-sm-2 control-label">Section</label>
                                                <div class="col-sm-10">
                                                    
             <?php
            require_once('config.php'); 
			
$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
if (mysqli_connect_errno($con))echo "Failed to connect to MySQL: " . mysqli_connect_error();
$query = mysqli_query($con,"Select * FROM `section`"); // Run your query
echo '<select class="form-control sectionname" name="newsectionname" >'; // Open your drop down box

// Loop through the query results, outputing the options one by one
while ($row = mysqli_fetch_array($query)) {
  // echo '<option value="'.$row['SectionID'].'">'.$row['SectionName'].'</option>';
  ?>
   <option value="<?php echo $row['SectionID'];?>" > <?php echo $row['SectionName']; ?></option>;
  <?php 
}

echo '</select>';// Close your drop down box
                
            ?>
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="example-email">News Title</label>
												<div class="col-md-10">
													<div id='mod-news-input1' ></div>
												<!--<input type="text" id="example-email" name="newnewstitle" class="form-control" placeholder="Title">-->
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                    <label for="ccomment" class="control-label col-lg-2">Description</label>
                                                    <div class="col-lg-10">
													<textarea class="form-control "  id='mod-news-input2' name="newnewsdescrtiption" required="" aria-required="true"></textarea>
                                                    </div>
											<!------------------------------------------------------->
											<div style="margin-5px;" id='mod-news-input3' ></div>
											 <div id="pic-name"></div>
                                                   <Button style="float:left;" type="button" class="btn btn-default waves-effect waves-light btn-xs m-b-5" onclick = "open_media()" >Open Gallery</Button>
                                            <!------------------------------------------------------->
                                           
                                                </div>
											
											<div class="modal-footer">
                                                <button type="submit" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                <button type="submit" name = "EditSection" class="btn btn-danger waves-effect waves-light save-category" >Save</button>
                                            </div>
											
                                        </form>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- END MODAL -->
								
								
								



								
								
<!--------------------------------------------------------------------------------------------------------------------------------------------------------->

                    </div> <!-- container -->
                               
                </div> <!-- content -->
<!--
                <footer class="footer text-right">
                    2015 © Moltran.
                </footer> -->

            </div>
            <!-- ============================================================== -->
			<!-----------------------------------------
														<div id='mod-din' ></div>
														<!----------------------------------------->
														
													 <!--<div class="col-md-6">
														    <label class="control-label"   >Section Name</label>
															<input class="form-control form-white" placeholder="" type="text" name="category-name"/>
                                                        </div>-->
			
            <!-- End Right content here -->
            <!-- ============================================================== -->
        
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


        <!-- CUSTOM JS -->
        <script src="js/jquery.app.js"></script>
		<script>
								$(document).ready(function(){
									$('.createnew').click(function(){
				//					alert("error");
										val=$(this).attr('sec');
										//val2=$(this).attr('secname');
										$('#mod-din').html('<input type="hidden" name="sectionid" value="'+val+'">');
										//$('#mod-sec').html('<input type="hidden" name="myid" value="'+val2+'">');
										
									})
									
									$('.editnews').click(function(){
										val=$(this).attr('newsid');
										val2=$(this).attr('secname');
										val3=$(this).attr('newstitle');
										val4=$(this).attr('newsdesc');
										val5=$(this).attr('newsimage');
										if(val5=="none")val5="none.png";
										$('#mod-news-din').html('<input type="hidden" name="newsid" value="'+val+'">');
										$('#mod-news-sec').html('<input type="hidden" name="sectionid" value="'+val2+'">');
										$('#mod-news-input1').html('<input type="text" name="newnewstitle" class="form-control" value="'+val3+'">');
										$('#mod-news-input2').html(val4);
										$('#mod-news-input3').html('<img src="uploads/'+val5+'" width="50px" height="50px" >  <input style="margin:5px;" type="hidden" class="form-control" name="imagename" value="'+val5+'" readonly >');
										$('.sectionname option[value="'+val2+'"]').prop('selected', true);
										
									})
									
									$('.editusers').click(function(){
										var checkadd='';
										var checkedit='';
										var checkdelete='';
										val_userid=$(this).attr('userid');
										val_username=$(this).attr('username');
										val_user_password=$(this).attr('userpassword');
										val_user_privadd=$(this).attr('privadd');
										val_user_privedit=$(this).attr('privedit');
										val_user_privdelete=$(this).attr('privdelete');
										if(val_user_privadd==1)checkadd="checked";
										if(val_user_privedit==1)checkedit="checked";
										if(val_user_privdelete==1)checkdelete="checked";
										$('#mod-user-input').html('<input type="hidden" name="userid" class="form-control" value="'+val_userid+'">');
										$('#mod-user-input').append('<input style="margin-top:10px;" type="text" name="username" class="form-control" value="'+val_username+'">');
										$('#mod-user-input').append('<input style="margin-top:10px;" type="text" name="password" class="form-control" value="'+val_user_password+'">');
										$('#mod-user-input').append('<div style="margin-left: 100px;" class="checkbox checkbox-primary"><input id="checkbox_add" type="checkbox" name="add" value="1" '+checkadd+' ><label for="checkbox_add">Add</label></div>');
										$('#mod-user-input').append('<div style="margin-left: 100px;" class="checkbox checkbox-primary"><input id="checkbox_edit" type="checkbox" name="edit" value="1" '+checkedit+' ><label for="checkbox_edit">Edit</label></div>');
										$('#mod-user-input').append('<div style="margin-left: 100px;" class="checkbox checkbox-primary"><input id="checkbox_delete" type="checkbox" name="delete" value="1" '+checkdelete+' ><label for="checkbox_delete">Delete</label></div>');
										
										
									})
									
									
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
								
								
								
$('#form_id').on('submit', function(e){
    e.preventDefault();
    $.ajax({
       type: "POST",
       url: "/postinfo.php",
       data: $(this).serialize(),
       success: function() {
         alert('success');
       }
    });
});
								
								


			$( document ).ready(function() {
            $('.picpick').click(function(){
                name = $(this).attr('name');
                  //$('#pic-name').html(name);
					$('#pic-name').html('<input style="margin:5px;" type="text" class="form-control" name="imagename" value="'+name+'" readonly >');
        })
           
        });

		
								
								
								</script>
	
	</body>
</html>