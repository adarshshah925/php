<?php 
if($_SERVER['REQUEST_METHOD']=="POST"){
    $mysqli=new mysqli('localhost', 'root', '', 'forum');
    $q='insert into messages(forum_id, parent_id, user_id, subject,body,date_entered) values (?,?,?,?,?,NOW())';
    $stmt=$mysqli->prepare($q);
    $stmt->bind_param( 'iiiss',$forum_id,$parent_id,$user_id,$subject,$body);
    $forum_id=(int)$_POST['forum_id'];
    $parent_id=(int)$_POST['parent_id'];
    $user_id=3;
    $subject=strip_tags($_POST['subject']);
    $body=strip_tags($_POST['body']);
    $stmt->execute();
        if (mysqli_stmt_affected_rows($stmt) == 1){
    echo '<p>Your message has been
    posted.</p>';
    } else {
    echo '<p style="font-weight:
    bold; color: #C00">Your
    message could not be posted.
    </p>';
    echo '<p>' . mysqli_stmt_error
    ($stmt) . '</p>';
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
    <form action="" method="post">
       <fieldset><legend>Post a message</legend>
        <p><strong>Subject</strong>:
          <input type="text" name="subject" size="30" maxlength="100">
        </p>
        <p><strong>Body</strong>:
        <textarea name="body" id="" cols="30" rows="3"></textarea>
        </p>
    </fieldset>
    <div align="center">
        <input type="submit" name="submit" value="submit">
    </div>
    <input type="hidden" name="forum_id" value="1">
    <input type="hidden" name="parent_id" value="0">   
</form>
</body>
</html>