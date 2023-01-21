<?php
// ЕСЛИ ПОЛЬЗОВАТЕЛЬ ЕЩЕ НЕ ЗАШЕЛ НА САЙТ, ПЕРЕНАПРАВИТЬ ЕГО НА СТРАНИЦУ ВХОДА
if (!isset($_COOKIE['login'])) {
    header('Location: index.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
    <div class="home">
        <p>Добро пожаловать к нам, <strong><?= $_COOKIE['login'] ?></strong></p>
        <br>
        <a href="logout.php"> Выйти</a>
    </div>
</body>

</html>