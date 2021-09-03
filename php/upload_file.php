<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Upload an RTF Document
    </title>
</head>

<body>
    <?php # Script 13.3 -upload_rtf.php
    if ( $_SERVER['REQUEST_METHOD'] =='POST') {
        if (isset($_FILES['upload']) && file_exists($_FILES['upload']['tmp_name'])) {
            $fileinfo = finfo_open(FILEINFO_MIME_TYPE);
            if (finfo_file($fileinfo,$_FILES['upload']['tmp_name']) =='image/png') {
                echo '<p><em>The file would be acceptable!</em></p>';
            } else { // Invalid type.
                echo '<p style="font-weight: bold; color: #C00">Please upload an RTF document.</p>';
            }
        } // End of isset($_FILES['upload']) IF.
    } // End of the submitted conditional.

    $host=$_SERVER['HTTP_HOST'];
    echo $host;
    ?>
    <form enctype="multipart/form-data" action="" method="post">
        <input type="hidden" name="MAX_FILE_SIZE" value="524288">
        <fieldset>
            <legend>Select an RTF
                document of 512KB or smaller
                to be uploaded:</legend>
            <p><strong>File:</strong> <input type="file" name="upload"></p>
        </fieldset>
        <div align="center"><input type="submit" name="submit" value="Submit"></div>
    </form>