<?php
/*
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['submit'])) {
        $quantity = (int)$_POST['quantity'];
        $price = (int)$_POST['price'];
        $tax = (float)$_POST['tax'];

        // applying filter sanitisation and validation
        $quantity = isset($quantity) ? filter_var($quantity, FILTER_VALIDATE_INT, ['min_range=>1']) : NULL;
        $price = isset($price) ? filter_var($price, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION) : NULL;
        $tax = isset($tax) ? filter_var($tax, FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION) : NULL;
        // checking variables has proper values
        if (($quantity > 0) && ($price > 0)) {
            $total = $quantity * $price;
            $total += $total * ($tax / 100);
            echo '</p>Total cost of purchasing' . $quantity . ' widigits at $' . number_format($price, 2) . 'each , plus tax,is $' . number_format($total, 2) . '.</p>';
        } else {
            echo '<p style="font-weight:
            bold; color: #C00">Please
            enter a valid quantity,
            price, and tax rate.</p>';
        }
    }
}
*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/test.js"></script>  
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Widigits Cost Calculator</h2>
            <p id="results"></p>
        <form action="calculate.php" id="calculator" method="post">
            <p>Quantity: <input type="number" name="quantity" 
            id="quantity">
            <span class="errorMessage" id="quantityError">Please enter a valid quantity!</span></p>
            <p>Price: <input type="number" name="price" id="price" >
            <span class="errorMessage"id="priceError">Please enter a valid price!</span></p>
            <p>Tax(%): <input type="text" name="tax" id="tax" step="0.1" min="0.1" >
            <span class="errorMessage" id="taxError">Please enter a valid tax!</span></p>
            <p><input type="submit" name="submit" id="submit" value="calculate">
            </p>
        </form>
        </div>  
    </div>
</body>

</html>