<?php
// УДАЛЯЕМ КУКИ
setcookie('login', '', time() - 3600 * 24);
// ПЕРЕНАПРАВЛЕНИЕ НА СТРАНИЦУ ВХОДА НА САЙТ
header('Location: ../index.php');
