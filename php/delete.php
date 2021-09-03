<?php 
require('../../config.php');
if((isset($_POST['submit']))&& $_POST['sure']=='yes'){
echo "adarsh";
$sql="delete from registrations where id={$_GET['id']}";
$r=mysqli_query($conn, $sql);
if($r==TRUE){
    echo "record deleted successfully";
}
else{
    echo mysqli_error($conn);
    echo $sql;  
}
}else if((isset($_POST['submit']))&& $_POST['sure']=='No'){
 echo "cancel";
}
?>
<p>Are you sure you want to delete the record</p>
<form action="" method="post">
<p>Yes:<input type="radio" name="sure" value="yes"></p>
<p>No:<input type="radio" name="sure" value="No"></p>
<input type="submit" name="submit" value="submit">
</form>