<?php define('TITLE','calculator.php');
include('header.php'); ?>


<!-- Creating Sticky form-->

    <form action="" method="post">
        <p>Distance (in miles): <input type="number" name="distance"  value="<?php if(isset($_POST['distance'])){echo $_POST['distance'];} ?>"></p>
        <p> Average Per Gallon: <!--<input type="radio" name="gallon_price" value="3.00">3.00
        <input type="radio" name="gallon_price" value="3.50">3.50
        <input type="radio" name="gallon_price" value="4.00">4.00 -->
       <?php create_radio('3.00');
             create_radio('3.50');
             create_radio('4.00');
             
       ?>
        </p>
        <p>Fuel Efficiency:
        <select name="efficiency">
            <option value="10"<?php  if (isset($_POST['efficiency']) && ($_POST['efficiency'] =='10')) echo ' selected="selected"'; ?>>Terrible</option>
            <option value="20"<?php  if(isset($_POST['efficiency']) && $_POST['efficiency']==20){echo 'selected="selected"';}?>>Decent</option>
            <option value="30"<?php  if(isset($_POST['efficiency']) && $_POST['efficiency']==30){echo 'selected="selected"';}?>>Very Good</option>
        </select>
        </p>
        <p><input type="submit" name="submit" value="Calculate"></p>
    </form>
   <?php if(isset($msg)){echo $msg;} ?>


</body>
</html>

<?php 

// creating a button for radio
function create_radio($value, $name="gallon_price"){
       echo '<input type="radio" name="'.$name.'" class="check" value="'.$value.'"';

       if(isset($_POST['gallon_price'])&& ($_POST['gallon_price']==$value)){
           echo 'checked="checked"';
       }
       echo '>';
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    if (isset($_POST['distance'],
    $_POST['gallon_price'],
    $_POST['efficiency']) &&
    is_numeric($_POST['distance']) &&
    is_numeric($_POST['gallon_price'])
    && is_numeric($_POST
    ['efficiency']) ) {
        $gallons=$_POST['distance'] /$_POST['efficiency'];
        $dollors=$gallons*$_POST['gallon_price'];
        $hours=$_POST['distance']/65;
        //printing the result
        echo $msg= '<div class="page-header"><h1>Estimated Cost</h1>
        <p>Total cost of driving'.$_POST['distance'].'miles, averaging'
        .$_POST['efficiency'].'miles per gallon, and paying an average of $'
        .$_POST['gallon_price'].' per gallon,
        is $'.number_format
        ($dollors, 2) . '. If you drive
        at an average of 65 miles per
        hour, the trip will take
        approximately ' . number_format
        ($hours, 2) . ' hours.</p></div>';  
        echo "adarsh";
    }
    else{
        echo "fail";
    }
}
$n=60;
$t=floor($n/24);
echo $t;
?>

<?php include('footer.php'); ?>
