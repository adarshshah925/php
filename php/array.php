<?Php
include('../../config.php');
// indexed array
$array=[];  
$array[0]="adarsh";
$array[1]=1;
$array[2]="shah";
echo gettype($array[1]); // get type of variable
// accessing each item of the array.
foreach($array as $key=>$values){
    echo $key;
    echo $values.'<br>';
}
// creating array by using array function
$country = array('IND'=>'India',
'Nep'=>'Nepal',
'Pak'=>'Pakistan',
'Afg'=>'Afganistan',
'Ban'=>'Bangladesh',
'Sri'=>'Srilanka',
'Bhu'=>'Bhutan',
'Chi'=>'China',
); 
//accessing associative array
foreach($country as $keys=>$values){
    echo $keys.':'.$values.'<br>';
}
// creating pull down calender

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
    <form action="submit.php">
      
     <?php
        // creating month array
        $month=array(1=>'january','Feburary', 'March', 'April', 'May', 'June', 'July', 'August',
        'september','october', 'november', 'December');

        //making days and year array
        $days=range(1,31);
        $year=range(2017,2027);

        // Making Month Pull Down
        echo '<select name="months">';
            foreach($month as $key=>$values){
                echo "<option value=\"$key\">$values</option>\n";
            }
        
        echo '</select>';
        //making day pull down

        echo '<select name="day">';
          foreach($days as $key=>$values){
              echo "<option value='$key'>$values</option>";
          }
          echo '<select>';

          // making year pull down
          echo '<select  name="year">';
           foreach($year as $key=>$values){
               echo "<option value='$key'>$values</option>";
           }
           echo '</select>';
         // to determine the no of elements in array 
         echo count($month);
         // checking the variable is array or not

         echo is_array($month);// it returns 1 for true and 0 for false.
         ?>
         </form>
         <?php
         //Multidinebtional array
        // creating multidimentional array

        $primes=[2,3,5,7,11,13,17,19,23,29,31,37,41,43,47];
        $sphenic=[1,2,3,4,5,7,8,9,66,12,14,18,20,22,26,28];
        $number=array('primes'=>$primes,
        'sphenic'=>$sphenic);
        //accessing each elemnet of the multidimentinal array
        foreach($number as $type=>$list){   
            echo $type;
            foreach($list as $key=>$values)
            {
                echo $key.':'.$values.'<br>';
            }        }
             echo '<br>';
            // shorting of array
            echo rsort($sphenic);
            echo '<br>';
            foreach($sphenic as $values){
                echo $values.'<br>';
            }

            // converting a string into array
            $str="Sun-Mon-Tue-Wed-Thu-Fri-Sat";
            $array=explode('-', $str);
            echo gettype($array);
            foreach($array as $key=>$values){
                echo $values.'<br>';
            }
            $string=implode('-',$array);
            echo $string;
     ?>  
     <!-- Creating Movie Review And Title-->

     <table>
     <thead>
     <tr>
     <td><h2>Rating</h2></td>
     <td><h2>Title</h2></td>
     </tr>
     </thead>
     <tbody><?php
     $movies=array('captain america'=>9,
     'Dolittle'=>7,
     'Iron man'=>9.5,
     'Thor'=>7,
     'Gardian Of The Galexy'=>5,
     'Hulk'=>7,
     'Ant man'=>6);
     foreach($movies as $key=>$values){
         echo "<tr><td>$key</td><td>$values</td></tr>";
     }
     
     ksort($movies);
     echo '<tr><td colspan="2">
 <strong>Sorted by Title:
 </strong></td></tr>';

     foreach($movies as $key=>$values){
        echo "<tr><td>$key</td><td>$values</td></tr>";
    }
    arsort($movies);
    echo '<tr><td colspan="2">
    <strong>Sorted by Rating:
    </strong></td></tr>';
    foreach($movies as $key=>$values){
        echo "<tr><td>$key</td><td>$values</td></tr>";
    }
    $server=$_SERVER;
    echo gettype($server);
     ?>
     </tbody>     
     </table>


     <?php $a=array("A"=>"adarsh", "B"=>"kumar");
     $b=array("c"=>"shah", "D"=>"sushil");

     $ada=array($a,$b);
     echo gettype($ada);
     echo" {$a['B']}";
     
     echo var_dump($movies);
     print_r($movies);
     
     ?>
    
</body>
</html>