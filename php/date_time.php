<?php 
$stamp=mktime(5,5,5,7,20,2021);

//echo checkdate(19,2,2021);

echo date('F j,Y');
echo "<br>";
echo $stamp;
//get date function 
$today=getdate();
echo $today['month'];
foreach($today as $key=>$values){

    echo $key.':'.$values;
    echo "<br>";
}
?>