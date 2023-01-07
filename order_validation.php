<?php
session_start();
require_once "db_config.php";
require_once "functions.php";

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

// Pobranie danych z formularza
$name = $_POST['name'];
$surname = $_POST['surname'];
//$login = $_POST['login'];
//$password = $_POST['password'];
$email = $_POST['email'];
$street = $_POST['street'];
$house_number = $_POST['house_number'];
$zip_code = $_POST['zip_code'];
$city = $_POST['city'];


// Walidacja danych
if (empty($name)) {
    $_SESSION['error_imie'] = "Imię jest wymagane!";
    header('Location: order_form.php');
    exit;
}
if (empty($surname)) {
    $_SESSION['error_nazwisko'] = "Nazwisko jest wymagane!";
    header('Location: order_form.php');
    exit;
}
//if (empty($login)) {
//    $_SESSION['error_login'] = "Login jest wymagany!";
//    header('Location: order_form.php');
//    exit;
//}
//if (empty($password)) {
//    $_SESSION['error_haslo'] = "Hasło jest wymagane!";
//    header('Location: order_form.php');
//    exit;
//}
if (empty($email)) {
    $_SESSION['error_email'] = "Adres email jest wymagany!";
    header('Location: order_form.php');
    exit;
}
if (empty($street)) {
    $_SESSION['error_street'] = "Ulica jest wymagana!";
    header('Location: order_form.php');
    exit;
}
if (empty($house_number)) {
    $_SESSION['error_house_number'] = "Numer domu/mieszkania jest wymagany!";
    header('Location: order_form.php');
    exit;
}
if (empty($zip_code)) {
    $_SESSION['error_zip_code'] = "Kod pocztowy jest wymagany!";
    header('Location: order_form.php');
    exit;
}
if (empty($city)) {
    $_SESSION['error_city'] = "Miasto jest wymagane!";
    header('Location: order_form.php');
    exit;
}

// Tworzenie wiadomości
$to = $email;
$from = 'SKLEP ROWEROWY - PROJEKT TI Zajglic no-reply@localhost';
$replyTo = 'Biuro biuro@localhost';
$subject = 'Potwierdzenie zamówienia';

$message = '
<html lang="pl-PL">
  <head>
    <title>Potwierdzenie zamówienia</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <h1>Witaj ' . $name . ' ' . $surname . ',</h1>
    <p>Dziękujemy za dokonanie zamówienia w naszym sklepie. Poniżej przedstawiamy szczegóły Twojego zamówienia:</p>
    <hr>
    <h2>Adres dostawy:</h2>
    <p>' . $street . ' ' . $house_number . '<br>
    ' . $zip_code . ' ' . $city . '</p>
<h2>Zamówienie:</h2>
    <table style="border: 2px solid black; border-collapse: collapse;">
      <tr>
        <th style="text-align: left; border: 1px solid black">Nazwa produktu </th>
        <th style="text-align: left; border: 1px solid black"> Cena </th>
      </tr>';
$total_price = 0;

// Pętla przechodząca przez wszystkie produkty w koszyku
foreach ($_SESSION['cart'] as $product) {
// Pobierz szczegóły produktu z bazy danych
    $product_id = $product['product_id'];
    $sql = "SELECT * FROM products WHERE id='$product_id'";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
// Dodaj produkt do tabeli w wiadomości email
    $message .= '<tr>
<td style="text-align: left; border: 1px solid black; width: 50%">' . $row['name'] . '</td>
<td style="text-align: left; border: 1px solid black; width: 50%">' . $row['price'] . ' zł</td>

  </tr>
  ';
    $total_price += (int)$row['price'];
}
$message .= '

  <tr><b>Łączna kwota zamówienia:</b>
  <td style="border-left: 1px solid black;"><b>' . $total_price . ' zł</b></td>
  </tr>

  </table>
  <p>Mamy nadzieję, że będziesz zadowolony z zakupów w naszym sklepie. Do zobaczenia wkrótce!</p>
  <p>Z poważaniem,</p>
  <p>Zespół SKLEP ROWEROWY - PROJEKT TI Zajglic</p>
  </body>

</html>';

$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-Type: text/html; charset=utf-8' . "\r\n";
$headers .= 'From: ' . $from . "\r\n";
$headers .= 'Reply-To: ' . $replyTo . "\r\n";

if(mail($to, $subject, $message, $headers)){
    header('Location: order_confirm.php');

}else{
    "NIEPOWODZENIE";


}

