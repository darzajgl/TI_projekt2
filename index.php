<?php

session_start();

require_once "db_config.php";
require_once "functions.php";

mysqli_report(MYSQLI_REPORT_STRICT);

if (isset($_POST['add'])) {
//    print_r($_POST['product_id']);
    if (isset($_SESSION['cart'])) {
//        print_r($_SESSION)['cart'];

        $item_array_id = array_column($_SESSION['cart'], 'product_id');
//        print_r($item_array_id);
        if (in_array($_POST['product_id'], $item_array_id)) { //sprawdzenie czy jest zawarty
            echo "<script>alert('Przedmiot jest już dodany do koszyka')</script>";
        } else {
            $count = count($_SESSION['cart']); //określenie wielkości array
            $item_array = array('product_id' => $_POST['product_id']);

            $_SESSION['cart'][$count] = $item_array;
//            print_r($_SESSION['cart']);
        }
    } else {
        $item_array = array(
            'product_id' => $_POST['product_id']
        );
        $_SESSION['cart'][0] = $item_array;
//        print_r($_SESSION['cart']);
    }
}


//połączenie z DB
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
?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="utf-8">
    <title>Sklep rowerowy</title>
    <link rel="stylesheet" href="style.css">
    <title>Sklep internetowy</title>
    <!-- style.css -->
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!--koszyk z licznikiem-->
    <nav>
        <div class="nav-right">
        <a href="cart.php" class="nav-item active">
            <h4 class="px-10 cart">Koszyk:
                <?php
                if (isset($_SESSION['cart'])) {
                    $count = count($_SESSION['cart']);
                    echo "<span id='cart_count' class='text-warning bg-light'>$count</span>";
                } else {
                    echo "<span id='cart_count' class='text-warning bg-light'>0</span>";
                }
                ?>
            </h4>
        </a>
        </div>
    </nav>

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
    <div class="row text-center py-5">
                    <?php
            $sql = "SELECT * FROM products";
            $result = mysqli_query($connection, $sql);
            while ($row = mysqli_fetch_assoc($result)) {

                component($row['name'], $row['price'], $row['description'], $row['image'], $row['id']);
            }
            ?>
        </div>
    </div>
</body>
</html>

