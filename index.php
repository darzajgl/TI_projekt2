<?php

session_start();
require_once "db_config.php";
require_once "functions.php";
mysqli_report(MYSQLI_REPORT_STRICT);

//połączenie z DB
try {
    $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if ($connection->connect_errno !== 0) {
        throw new Exception((mysqli_connect_errno()));
    }
} catch
(Exception $error) {
    $_SESSION['error_server'] = $error->getMessage();
    header('Location: index2.php');
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
</head>
<h1>Rowerowy sklep internetowy</h1>
<body>
<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
        crossorigin="anonymous"></script>


<div class="container">
    <div class="row text-center py-5">
        <?php
        $sql = "SELECT * FROM products";
        $result = mysqli_query($connection, $sql);
        while ($row = mysqli_fetch_assoc($result)) {

            component($row['name'], $row['price'], $row['image']);
        }

        ?>

    </div>
</div>
</body>

