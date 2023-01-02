<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Szczegóły zamówienia</title>
    <meta http-equiv="X-Ua-Compatible" content="IE=edge">

    <link rel="stylesheet" href="style.css">
<!--    <link href="https://fonts.googleapis.com/css?family=Lobster|Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">-->
    <!--[if lt IE 9]>
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>-->
<!--    <![endif]-->-->
</head>

<body>
<div class="container">

    <header>
        <h1>Zamówienie</h1>
    </header>

    <main>
        <article>

            <div class="partL">



            </div>

            <div class="partR">

                <p class="content">text text text</p>
                <p class="content">abcd abcd abcd abcd</p>

                <form method="post" action="order_confirm.php">

                    <label>Wpisz poniżej swój poprawny adres e-mail:
                        <hr>
                        <input type="email" name="email" <?= isset($_SESSION['given_email']) ? 'value="' . $_SESSION['given_email'] . '"' : '' ?>>
                    </label>
                    <input type="submit" value="Wyślij to zamówienie">

                    <?php
                    if (isset($_SESSION['given_email'])) {
                        echo '<p>To nie jest poprawny adres!</p>';
                        unset($_SESSION['given_email']);
                    }
                    ?>

                </form>

            </div>

            <div style="clear:both"></div>

        </article>
    </main>

</div>
</body>
</html>