<?php
// ЕСЛИ ПОЛЬЗОВАТЛЬ УЖЕ ВОШЕЛ НА САЙТ ПЕРЕНАПРАВИТЬ ЕГО НА СТРАНИЦУ ЕГО ПРОФИЛЯ
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
    <title>Авторизация</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

</head>

<body>
    <form id="authorization-form" action="" method="post" enctype="multipart/form-data">
        <label for="">Логин</label>
        <input type="text" name="auth-login" id="auth-loginid" placeholder="Введите свой логин" required>
        <!-- oninput="testFunction()" -->
        <span class='error' id="auth-login-error"></span>
        <p class="input-correction" id="auth-login-info">не менее 6 символов
        </p>
        <label for="">Пароль</label>
        <input type="password" name="auth-password" placeholder="Введите свой пароль" required>
        <span class='error' id="auth-password-error"></span>

        <p class="input-correction" id="auth-password-info">не менее 6 символов, должен содержать буквы и цифры</p>
        <input type="submit" value="Войти" id="submitBtn" disabled><span class='error' id="auth-error"></span>
        <p>У вас нет аккаунта? <a href=" /register.php">Зарегистрироваться</a></p>

    </form>



    <script src="assets/js/ajax-auth.js"></script>
    <script src="assets/js/disable.js"></script>

</body>

</html>