<?php

// РАЗРЕШАЕМ ДОСТУП К ЭТОЙ СТРАНИЦЕ ТОЛЬКО С ПОМОЩЬЮ AJAX
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

    // ПОДКЛЮЧАЕМ НЕОБХОДИМЫЕ КЛАССЫ
    require_once('../classes/registration.php');
    require_once('../classes/authorization.php');
    require_once('../classes/CRUDJSON.php');

    // ЧЕРЕЗ AJAX ПРИХОДЯТ ЭТИ ДАННЫЕ
    $login = $_POST['auth-login'];
    // НЕ ХРАНИМ ПАРОЛЬ В ОТКРЫТОМ ВИДЕ
    $_POST['auth-password'] = md5($_POST['auth-password']);
    $password = $_POST['auth-password'];
    $registerFormData = $_POST;


    //ПРОВЕРКА ВВЕДЕННЫХ ДАННЫХ
    /* СНАЧАЛА ПРОВЕРЯЕМ ДАННЫЕ НА КОРРЕКТНОСТЬ,
    ** ПОТОМ ПРОВЕРЯЕМ ЕСТЬ ЛИ ТАКИЕ ДАННЫЕ В БАЗЕ,
    ** ИНАЧЕ ЗАЧЕМ ТРЕВОЖИТЬ БАЗУ ЕСЛИ ДАННЫЕ НЕ СООТВЕТСВУЮТ ТРЕБОВАНИЯМ ДЛЯ ВВОДА В ФОРМУ 
    */

    $authorization = new Authorization($login, $password);
    $authorization->authInformationChecking($login, $password);
    //ЕСЛИ ОШИБКИ ЕСТЬ ОТПРАВЛЯЕМ ИХ ОБРАТНО
    if (!empty($authorization->errors)) {
        $authorization->getErrors();
    } else {
        // ЕСЛИ ОШИБОК НЕТ ПРОВЕРЯМ ЕСТЬ ЛИ ТАКОЙ ПОЛЬЗОВАТЛЬ В БАЗЕ ДАННЫХ
        $crudjson = new CRUDJSON;
        $crudjson->checkInfo($registerFormData);
    }
}
