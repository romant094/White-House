<?php
$to = "info@rr67.ru";
$sub = "Заполнена форма обратной связи на сайте rr67.ru";

$message = "<b>Имя:</b> ".$name = $_POST['name']."<br>";
$message .= "<b>Номер телефона:</b> ".$phone = $_POST['phone']."<br>";

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

$verify = mail($to, $sub, $message, $headers);

if ($verify) {
 header('Refresh: 5; URL=https://rr67.ru');
 echo '<!DOCTYPE html>
    <html lang="ru-ru"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/bs4.css">
    <link rel="stylesheet" href="css/stylesheet.css">
    </head>
    <body><h1>Спасибо за Ваше обращение. Мы свяжемся с Вами в ближайшее время.</h1></body></html>';}
else {
 header('Refresh: 5; URL=https://rr67.ru');
 echo '<!DOCTYPE html>
    <html lang="ru-ru"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/bs4.css">
    <link rel="stylesheet" href="css/stylesheet.css">
    </head>
    <body><h1>Произошла ошибка при отправке сообщения. Пожалуйста, попробуйте еще раз.</h1></body></html>';
}
?>
