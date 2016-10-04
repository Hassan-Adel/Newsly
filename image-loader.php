<?php 
$category=$_GET["category"];
$title=$_GET["title"];

$const="";
if($category!="all" && $title!="")$const=" `ImageCategory`='$category' And `ImageTitle`='$title' ";
else if($category!="all" && $title=="")$const="`ImageCategory`='$category' ";
else if($category=="all" && $title!="")$const="`ImageTitle`='$title' ";
else $const="1";
//$cat=$_GET["category"];

$con=mysqli_connect("127.0.0.1","root","","news_db");
$result = mysqli_query($con,"SELECT * from `gallery` Where $const ");
//$result = mysqli_query($con,"SELECT * from `gallery` Where `ImageCategory`='$cat' ");
 while($row = mysqli_fetch_array($result)){
 
                    ?>
					<img src="uploads/<?php echo $row['ImageName']; ?>" style="margin:5px;" width="150px" height="150px" onclick = "close_media()" class="picpick" name="<?php echo $row['ImageName']; ?>" />  
					<?php }	?>    
  
					
					<script>
					
					$('.picpick').click(function(){
                name = $(this).attr('name');
				//alert(name);
                $('#pic-name').html('<input style="margin:5px;" type="hidden" class="form-control" name="imagename" value="'+name+'" readonly > <img src="uploads/'+name+'"  width="80px" height="80px" > ');
        });
		
					
					</script>