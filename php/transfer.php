<?php
include('config.php');
if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['submit'])){
        echo "adarsh";
        if(isset($_POST['from'], $_POST['to'], $_POST['amount']) && is_numeric($_POST['from']) && is_numeric($_POST['to']) && is_numeric($_POST['amount'])){
            $from=$_POST['from'];
            $to=$_POST['to'];
            $amount=$_POST['amount'];
          //  echo $from;

            // make sure funds are available
            $q="SELECT balance from accounts where account_id=$from";
            $r=mysqli_query($conn, $q);
            $row=mysqli_fetch_assoc($r);
            if($r==FALSE){
                echo "fail";
                echo mysqli_error($conn);
            }else{
                if($amount>$row['balance']){
                    echo "insufficient fund available";
                }else{
                    // Turn auto commit off
                    mysqli_autocommit($conn, FALSE);
                    $q="UPDATE accounts set balance=balance-$amount where account_id=$from";
                    $r=mysqli_query($conn, $q);
                    if($r==FALSE){
                        mysqli_rollback($conn);
                        echo mysqli_error($conn);
                    }else{
                        $q="UPDATE  accounts set balance=balance+$amount where account_id=$to";
                        $r=mysqli_query($conn, $q);
                        if($r==FALSE){
                            mysqli_rollback($conn);
                        echo '<p>The transfer could not be made due to a system error. We apologizefor any inconvenience.</p>'; // Public message.
                        echo '<p>' . mysqli_error($conn) . '<br>Query: ' . $q . '</p>'; // Debugging message.
                        }
                        else{
                            mysqli_commit($conn);
                           echo "Fund transfer successful";
                        }
                    }
                }
            }
        }
        else { // Invalid submitted values.
            echo '<p>Please select a valid "from" and "to" account and enter a numeric amount to transfer.</p>';
        }
    }
}
$q= "SELECT account_id, concat(first_name, last_name) AS name, type, balance from accounts INNER JOIN customers using (customer_id) order
by name";
$r=mysqli_query($conn, $q);
/*if($r==TRUE){
    echo "success";
}
else{
    echo 'fail'. mysqli_error($conn).'<br> Query'.$q;
}
*/
$option='';
while($row=mysqli_fetch_assoc($r)){
    $option.="<option value=\"{$row['account_id']}\">{$row['name']}
    ({$row['type']})\${$row['balance']}</option>\n";
}
 // Create the form:
    echo '<form action=" " method="post">
<p>From Account: <select name="from">' . $option . '</select></p>
<p>To Account: <select name="to">' . $option . '</select></p>
 <p>Amount: <input type="number" name="amount" step="0.01" min="1"></p>
 <p><input type="submit" name="submit" value="Submit"></p>
</form>';
?>
