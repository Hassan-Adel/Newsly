<?php
if ($handle = opendir('uploads/')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            echo "<a href='download.php?file=".$entry."'>".$entry."</a>\n".'<br>';
        }
    }
    closedir($handle);
}
?>