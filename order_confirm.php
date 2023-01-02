<?php

session_start();

if (isset($_POST['email'])) {

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if (empty($email)) {

    $_SESSION['given_email'] = $_POST['email'];
    header('Location: cart.php');

} else {

    require_once 'db_config.php';
    $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if (!$connection) {
        die("Połączenie z bazą danych nie powiodło się: " . mysqli_connect_error());
    }

// przygotowanie zapytania
    $query = mysqli_prepare($connection, "INSERT INTO users VALUES (NULL, ?)");
    mysqli_stmt_bind_param($query, "s", $email);
    mysqli_stmt_execute($query);

    mysqli_stmt_close($query);
    mysqli_close($connection);

}

} else {

header('Location: index.php');
exit();
}

?>
<!DOCTYPE html>
<html lang="pl">
<head>

    <meta charset="utf-8">
    <title>Potwierdzenie</title>
    <meta http-equiv="X-Ua-Compatible" content="IE=edge">

    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Open+Sans:400,700&amp;subset=latin-ext"
          rel="stylesheet">
    <!--[if lt IE 9]>
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>-->
    <![endif]-->

</head>

<body>

<div class="container">

    <header>
        <h1>E-mail ze szczegółami zamówienia został wysłany</h1>
    </header>

    <main>
        <article>
            <p class="content">Dziękujemy za dokonanie zakupu</p>
        </article>
    </main>
    <a href="index.php">Powrót do strony sklepu</a>
</div>

</body>
</html>