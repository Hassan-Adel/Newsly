             
		<?php

		// open this directory 
		$myDirectory = opendir("uploads");

		// get each entry
		while($entryName = readdir($myDirectory)) {
			$dirArray[] = $entryName;
		}

		// close directory
		closedir($myDirectory);

		//	count elements in array
		$indexCount	= count($dirArray);

		?>
		

			<?php
			// loop through the array of files and print them all in a list
			for($index=0; $index < $indexCount; $index++) {
				$extension = substr($dirArray[$index], -3);
				if ($extension == 'jpg' || $extension == 'png' ){ // list only jpg & png
                    
					echo '<img src="uploads/' . $dirArray[$index] . '" style="margin:5px;" width="150px" height="150px" onclick = "close_media()" class="picpickorg" name="'.$dirArray[$index] .'" /> ';
                
                }	
			}
			?>