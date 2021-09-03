<?php

use setasign\Fpdi\PdfReader\Page;

require('../../config.php');

$sql="select count(id) from registrations";
$result=mysqli_query($conn, $sql);
$row=mysqli_fetch_array($result, MYSQLI_NUM);

$records=$row[0];
//displaying per page
$display=2;

//Finding total no of pages

if($records>$display){
    $pages=ceil($records/$display);
}
else{
    $Page=1;
}

if(isset($_GET['s'])){
    $start=$_GET['s'];
}
else{
    $start=0;
}
// sorting the result



$q="select * from registrations limit $start, $display";
$r=mysqli_query($conn, $q);
if($r==TRUE){
    echo '<table><thead><tr>
             <th>First Name</th> <th>Last Name</th> <th>Email</th> <th>Registration Date</th><th>Edit</th><th>Delete</th>
          </tr></thead><tbody>';
    while($row=mysqli_fetch_array($r, MYSQLI_NUM)){
        echo '<tr>
        <td>'.$row[1].'</td>
        <td>'.$row[2].'</td>
        <td>'.$row[3].'</td>
        <td>'.$row[6].'</td>
        <td><a href="edit.php?id='.$row[0].'">Edit</a></td>
        <td><a href="delete.php?id='.$row[0].'">Delete</a></td>
        </tr>';
    }
    echo'</tbody></table>';
    
    }else{
        //debugging message
        echo "<p>".mysqli_error($conn)."<br>".$q."</p>";
    }
    if($pages>1){
        $current_page=($start/$display) +1;
        if($current_page!=1){
            echo '<a href="pagination.php?s='.($start-$display).'&p='.$pages.'">Previous</a>';
            
        }
        for($i=1; $i<=$pages;$i++){
                echo '<a href="pagination.php?s=' . (($display *
                    ($i - 1))) . '&p=' . $pages
                    . '">' . $i . '</a> ';
        }
        if($current_page!=$pages){
            echo '<a href="pagination.php?s='.($start+$display).'&p='.$pages.'">Next</a>';
        }

    
    }

?>