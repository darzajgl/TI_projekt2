<?php

session_start();

//if (!isset($_SESSION['email'])) {
//// przekierowanie użytkownika na stronę główną
//    header("Location: index.php");
//    exit;
//}

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
