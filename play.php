<?php

$dir = "Images/Coffee";

// Open a directory, and read its contents
if ($dh = opendir($dir)) {
    while ($file = readdir($dh)) {
        $name = "filename:" . $file . "<br>";
        echo $name;
    }
    closedir($dh);
}
