<?php
#solution
/*  Name : Galal
    Phone : 01000498488
    Product: Laptop
    City:   Alex
    Delivery Tax : 50 EGP
    Price: 15000 EGP
    VAT:14%
    VAT Price:2100 EGP
    Price After VAT: 17100 EGP
    Discount:20%
    Discount Value:3420 EGP
    Price After Discount:13680 EGP
    Total Price:13730 EGP
*/
// print_r($_SERVER);die;
define('VAT', 0.14);

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    echo "<h1> Error 405 Method Not Allowed </h1>";
    die; // exit file
}

switch ($_POST['city']) {
    case 'cairo':
        $delivery = 0;
        break;
    case 'alex':
        $delivery = 50;
        break;
    default:
        $delivery = 200;
        break;
}

if ($_POST['product'] == "laptop") {
    $price = 15000;
    $discount = 0.2;
} elseif ($_POST['product'] == "mobile") {
    $price = 12000;
    $discount = 0.1;
} elseif ($_POST['product'] == "tv") {
    $price = 10000;
    $discount = 0.05;
} else {
    $price = 250;
    $discount = 0;
}

$vatPrice = $price * VAT; // 2100
$priceAfterVat = $vatPrice + $price; /// 17100
$discountValue  = $discount * $priceAfterVat; // 3420
$priceAfterDiscount = $priceAfterVat - $discountValue; // 13680
$totalPrice = $priceAfterDiscount + $delivery;
?>

<!doctype html>
<html lang="en">

<head>
    <title>Ecommerce</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center text-primary mt-5">
                <h4>
                    Your Invoice!
                </h4>
            </div>
            <div class="col-4 offset-4  mt-5">
                <ul>
                    <li>
                        Name: <b><?= $_POST['name'] ?> </b>
                    </li>
                    <li>
                        Phone: <b><?= $_POST['phone'] ?> </b>
                    </li>
                    <li>
                        Product: <b><?= $_POST['product'] ?> </b>
                    </li>
                    <li>
                        City: <b><?= $_POST['city'] ?> </b>
                    </li>
                    <li>
                        Delivery Tax: <b><?= $delivery ?> EGP</b>
                    </li>
                    <li>
                        Product Price: <b><?= $price ?> EGP</b>
                    </li>
                    <li>
                        VAT: <b><?= VAT * 100 ?> %</b>
                    </li>
                    <li>
                        VAT Price: <b><?= $vatPrice ?> EGP</b>
                    </li>
                    <li>
                        Price After Vat: <b><?= $priceAfterVat ?> EGP</b>
                    </li>
                    <li>
                        Discount: <b><?= $discount * 100 ?> %</b>
                    </li>
                    <li>
                        Discount Value: <b><?= $discountValue ?> EGP</b>
                    </li>
                    <li>
                        Price After Discount : <b><?= $priceAfterDiscount ?> EGP</b>
                    </li>
                    <li>
                        Total Price : <b><?= $totalPrice ?> EGP</b>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>