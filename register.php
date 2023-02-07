<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
session_start();
if (isset($_COOKIE['login'])) {
    header('Location: home.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

</head>

<body>
    <form id="registration-form" action="" method="post" enctype="multipart/form-data">
        <p>РЕГИСТРАЦИЯ</p>

        <label for="">Логин</label>
        <input type="text" name="login" id="loginid" placeholder="Ввелите свой логин" required>
        <span class='error' id="login-error"></span>
        <p class="input-correction" id="login-info">не менее 6 символов
        </p>
        <label for="">Пароль</label>
        <input type="password" name="password" id='password' placeholder="Введите свой пароль" required>
        <span class='error' id="password-error"></span>
        <p class="input-correction" id="password-info">не менее 6 символов, должен содержать буквы и цифры</p>
        <label for="">Подтверждение пароля</label>
        <input type="password" name="password_confirm" id='passwordConfirm' placeholder="Введите свой пароль еще раз" required>
        <span class='error' id="password-confirm-error"></span>
        <p class="input-correction"></p>
        <label for="">Почта</label>
        <input type="email" name="email" id="email" placeholder="Ввелите адрес своей почты" required>
        <span class='error' id="email-error"></span>
        <p class="input-correction"></p>
        <label for="">Имя</label>
        <input type="text" name="full_name" id='name' placeholder="Ввелите свое имя" required>
        <span class='error' id="full-name-error"></span>
        <p class="input-correction" id="login-info">не менее 2 символов, только буквы</p>
        <span class='error' id="space-error"></span>
        <input type="submit" value="Зарегистрироваться">
        <p>У вас уже есть аккаунт? <a href="/index.php">Авторезируйтесь</a></p>
    </form>

    <script src="assets/js/ajax-reg.js"></script>
    <script src="assets/js/form-validation.js"></script>
</body>

</html>