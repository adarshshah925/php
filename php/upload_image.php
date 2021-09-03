<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        $allowed = ['image/pjpeg', 'image/jpeg', 'image/JPG' .
            'image/V-PNG', 'image/PNG', 'image/png', 'image/x-png'];
        if (in_array($_FILES['upload']['type'], $allowed)) {
            if (move_uploaded_file($_FILES['upload']['tmp_name'], "../../uploads/{$_FILES['upload']['name']}")) {
                echo "File has been uploaded";
            }
        }
        if (!in_array($_FILES['upload']['type'], $allowed)) {
            echo "Please select the correct format";
        } else {
            // check for an error
            if ($_FILES['upload']['error'] > 0) {
                switch ($_FILES['upload']['error']) {
                    case 1:
                        print 'The file exceeds the upload_max_file_size setting in php.ini';
                        break;
                    case 2:
                            print 'The file exceeds the
                    MAX_FILE_SIZE setting in
                    the HTML form.';
                        break;
                    case 3:
                        print 'The file was only partially uploaded';
                        break;
                    case 4:
                        print 'No file was uploaded';
                        break;
                    case 6:
                        print 'No temporary folder is available';
                        break;
                    case 7:
                        print 'Unable to write to the disks';
                        break;
                    case 8:
                        print 'File Upload stopped';
                        break;
                    default:
                        print 'A system error occured';
                        break;
                }
            }
            // Deleting a file if its already exists
            if (file_exists($_FILES['upload']['tmp_name']) && is_file($_FILES['upload']['tmp_name'])) {
                unlink($_FILES['upload']['tmp_name']);
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="30000">
        File <input type="file" name="upload">
        <input type="submit" name="submit">
    </form>
</body>

</html>