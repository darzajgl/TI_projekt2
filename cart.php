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

//usuwanie przedmiotu z koszyka
if (isset($_POST['remove'])) {
    if ($_GET['action'] == 'remove') {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value["product_id"] == $_GET['id']) {
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('Przedmiot usunięty z koszyka')</script>";
                echo "<script>window.location = 'cart.php'</script>";
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
</head>
<body>
<div class="fieldset right">
    <form action="order_form.php">
        <?php
        if (empty($_SESSION['cart'])) {
            echo "<button type='button' class='right-button' onclick='alert(\"Twój koszyk jest pusty. Dodaj produkty, aby kontynuować zamówienie.\")'>Przejdź do złożenia zamówienia</button>";
        } else {
            echo "<button type='submit' class='right-button'>Przejdź do złożenia zamówienia</button>";
        }
        ?>
    </form>
</div>


<br>
<h5>MÓJ KOSZYK</h5>
<class id="container">
    <?php
    $total_amount = 0;
    if (isset($_SESSION['cart'])) {
        $product_id = array_column($_SESSION['cart'], 'product_id');

        $sql = "SELECT * FROM products";
        $result = mysqli_query($connection, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            foreach ($product_id as $id) {
                if ($row['id'] == $id) {
                    cartItem($row['name'], $row['price'], $row['image'], $row['id']);
                    $total_amount += (int)$row['price'];
                }
            }
        }
    } else {
        echo "<h5>Koszyk jest pusty</h5>";
    }
    ?>
    </div>

    <h5>PODSUMOWANIE ZAMÓWIENIA</h5>

    <div class="box">
        <div class="box-left">
            <?php
            if (isset($_SESSION['cart'])) {
                $count = count($_SESSION['cart']);
                echo "<h5>Razem produktów: $count</h5>";
            } else {
                echo "<h5>Brak produktów w koszyku</h5>";
            }
            ?>
        </div>
        <div class="box-center">
            <h5>Opłata za wysyłkę: Za darmo!</h5>
        </div>
        <div class="box-right">
            <?php
            if (isset($_SESSION['cart'])) {
                $count = count($_SESSION['cart']);
                echo "<h5><br>Całkowita należność</br><b>$total_amount PLN<b/></h5>";
            } else {
                echo "<h5></h5>";
            }
            ?>
        </div>
    </div>
</class>

<fieldset>
    <a href="index.php">Wróć do strony sklepu</a>
</fieldset>
</body>
</html>


