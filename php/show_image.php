<?php
define('title','Login');
$name = FALSE;
if(isset($_GET['image'])){
    $ext=strtolower(substr($_GET['image'], -4));
    if(($ext=='.jpg')OR ($ext=='jpeg')OR ($ext=='.png')){
          $image="../../uploads/{$_GET['image']}";
          echo $image;
          if(file_exists($image) && is_file($image)){
              $name=$_GET['image'];
             echo $name;
             
          }
    } 
}
// Retrieving image information
$info = getimagesize($image);
$fs = filesize($image);

header("Content-Type:{$info['mime']}\n");
header("Content-Disposition: inline; filename=\"$name\"\n");
header("Content-Length: $fs\n");
readfile($image);

if (!headers_sent()) {
    echo "fail";
} else {
    echo "successful";
}
