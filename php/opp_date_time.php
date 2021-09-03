<?php


$start=new DateTime();
$end=new DateTime();
$end->modify('+1 day');

$day= new DateInterval('P1D');
$end->add($day);


$format='y-m-d';
// begain defining function

function  validate_date($date){
    $array=explode('-', $date);
    if(count($array)!=3){
        return false;
    }
    if(!checkdate($array[1], $array[2], $array[0])){
        return false;
    }
    return $array;
    // echo print_r($array);
}
if(isset($_POST['start'],$_POST['end'])){
    if(list($sy,$sm,$sd)=validate_date($_POST['start']) && 
    list($ey,$em,$ed)=validate_date($_POST['end'])){
        $start->setDate($sy,$sm, $sd);
        $end->setDate($ey, $em, $ed);
        if($start<$end){
            $interval=$start->diff($end);
            echo "<p> The event has been planned starting on {$start->format($format)} and ending on {$end->format($format)} which 
            is a period of $interval->days day(s)</p>";
        }
        else { // End date must be later!
            echo '<p class="error">The
            starting date must precede
            the ending date.</p>';
            }  
   }
   else { // An invalid date!
    echo '<p class="error">One or
    both of the submitted dates
    was invalid.</p>';
   }

}
/*
$dt=new DateTime();
echo "<pre>";
echo print_r($dt);
echo "</pre>";
$dt->setDate(2020,7,20);
$dt->setTime(11,15);

// setting time zone
$tz=new DateTimeZone('America/New_York');
$dt->setTimezone($tz);
echo "<pre>";
echo print_r($dt);
echo "</pre>";
$dt->modify('+1 day');
echo "<pre>";
echo print_r($dt);
echo "</pre>";
*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
body {
 font-family: Verdana, Arial,
 Helvetica, sans-serif;
 font-size: 12px;
 margin: 10px;
}
label { font-weight: bold; }
.error { color: #F00;}
</style>
</head>
<body>
    <h2>Set the Start and end date for the things</h2>
    <form action="" method="post">
        <p><label for="start">Start Date</label><input type="date" name="start" value="<?Php echo $start->format($format) ?>"></p>
        <p><label for="end">End Date</label><input type="date" name="end" value="<?Php echo $end->format($format) ?>"></p>
        <p><input type="submit" name="submit"></p>
    </form>
</body>
</html>