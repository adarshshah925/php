<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="function.js"></script>
</head>
<body>
    <p>Click to an image to view it in a seperate window</p>


    <?php 
      $dir='../../uploads';
      $files=scandir($dir);
      foreach($files as $image){
          echo $image;
          if(substr($image, 0,1)!='.'){
            $image_size=getimagesize("$dir/$image");
            $image_name=urlencode($image);
             echo "<li><a href=\"javascript: create_window('$image_name', $image_size[0],$image_size[1])\">$image</a></li>\n";
          }
      }

    ?>
    <img src="" alt="">
    
</body>
</html>