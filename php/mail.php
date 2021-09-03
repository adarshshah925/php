<?php
if ($_SERVER['REQUEST_METHOD'] =='POST') { 
    function spam_scrubber($value){
        $very_bad=['to:', 'cc:','bcc:','content-type', 
        'mime-version:', 'multipart-mixed:', 'content-transfer-encoding'];
        foreach($very_bad as $v){
            if(stripos($value , $v)!==False){
                 return '';
            }
        }
        $value=str_replace(["\r", "\n","%0a", "%0d"], '', $value);
        return trim($value);
    }
    $scrubbed=array_map('spam_scrubber', $_POST);

    if(!empty($scrubbed['name'])&& !empty($scrubbed['email'])&& !empty($scrubbed['comments'])){
        $body="Name: {$scrubbed['name']}\n\n Comments:{$scrubbed['email']}";

        mail('adarshshah925@gmail.com', 'Contact form submission', '$body', "From: {$scrubbed['email']}");
        $scrubbed=[];
    } else{
        echo '<p style="font-weight: bold; color: #C00">Please fill out the form
completely. </p>';
    }
   /*   
    if (
        !empty($_POST['name']) &&
        !empty($_POST['email']) &&
        !empty($_POST['comments'])
    ) {
        $body = "Name: {$_POST['name']}\n\n
    Comments: {$_POST['comments']}";
        $body = wordwrap($body, 70);
        mail(
            'your_email@example.com',
            'Contact Form Submission',
            $body,
            "From: {$_POST['email']}"
        );
        echo '<p><em>Thank you for
    contacting me. I will reply
    some day.</em></p>';
    } else {
        echo '<p style="font-weight:
    bold; color: #C00">
    Please fill out the form
    completely.</p>';
    }
    */
} // End of main isset() IF.

?>
<p>Please fill out this form to contact me.</p>
<form action="" (563) method="post">
    <p>Name: <input type="text" name="name" size="30" maxlength="60" value="<?php if (isset($_POST['name'])) echo$_POST['name']; ?>"></p>
    <p>Email Address: <input type="email" name="email" size="30" maxlength="80" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"></p>
    <p>Comments: <textarea name="comments" rows="5" cols="30"><?php if (isset($_POST['comments'])) echo$_POST['comments'];?></textarea></p>
    <p><input type="submit" name="submit" value="Send!">
    </p>
</form>
</body>
</html>