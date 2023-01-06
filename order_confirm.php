<?php

session_start();

//if (!isset($_SESSION['email'])) {
//// przekierowanie użytkownika na stronę główną
//    header("Location: index.php");
//    exit;
//}
//    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

//    if (empty($email)) {
//        $_SESSION['email'] = $_POST['email'];
//        echo "email jest pusty";
////        header('Location: index.php');
//
//    } else {
//        echo $_SESSION['email'];
//        require_once 'db_config.php';
//        $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
//
//        if (!$connection) {
//            die("Połączenie z bazą danych nie powiodło się: " . mysqli_connect_error());
//        }
//
//    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Potwierdzenie</title>
    <meta http-equiv="X-Ua-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">

</head>
<body>
<div class="container">
    <header>
        <h1>E-mail ze szczegółami zamówienia został wysłany</h1>
    </header>
    <fieldset>
        <p class="content">Dziękujemy za dokonanie zakupu</p>
        <a href="index.php" onclick="<?php session_destroy(); ?>">Powrót do strony sklepu</a>
    </fieldset>
</div>
</body>
</html>
