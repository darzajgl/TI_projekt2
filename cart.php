<?php

session_start();

require_once "db_config.php";
require_once "functions.php";

try {
    $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if ($connection->connect_errno !== 0) {
        throw new Exception((mysqli_connect_errno()));
    }
} catch
(Exception $error) {
    $_SESSION['error_server'] = $error->getMessage();
    header('Location: index.php');
}

if (isset($_POST['remove'])) {
    if ($_GET['action'] == 'remove') {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value["product_id"] == $_GET['id']) {
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('Przedmiot usunięty z koszyka')</script>";
//                echo "<script>window.location = 'cart.php'</script>";
            }
        }
    }
}

?>


<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="utf-8">
    <title>Koszyk</title>
    <link rel="stylesheet" href="style.css">

    <!-- style.css -->
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
        crossorigin="anonymous"></script>

<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h5>Mój koszyk</h5>
                <hr>
                <?php
                if (isset($_SESSION['cart'])){
                    $product_id = array_column($_SESSION['cart'], 'product_id');

                    $sql = "SELECT * FROM products";
                    $result = mysqli_query($connection, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        foreach ($product_id as $id) {
                            if ($row['id'] == $id) {
                                cartItem($row['name'], $row['price'], $row['image']);
                            }
                        }
                    }
                } else {
                    echo "<h5>Koszyk jest pusty</h5>";
                }

                ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>