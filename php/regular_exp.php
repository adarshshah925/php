<?php 

$string="PHP is web scripting php language of choice";

$exp=preg_match_all("/[^po]/i", $string,$array);
echo "<pre>";
print_r($array);
echo "</pre>";
if($exp){
   echo "match was found";
}else{
   echo "not found";
}

?>