<?php

// РАЗРЕШАЕМ ДОСТУП К ЭТОЙ СТРАНИЦЕ ТОЛЬКО С ПОМОЩЬЮ AJAX
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

    //ПОДКЛЮЧАЕМ НЕОБХОДИМЫЕ КЛАССЫ
    require_once('../classes/registration.php');
    require_once('../classes/CRUDJSON.php');

    // ЧЕРЕЗ AJAX ПРИХОДЯТ ЭТИ ДАННЫЕ
    $login = $_POST['login'];
    $_POST['password'] = md5($_POST['password']);
    $password = ($_POST['password']);
    // НЕ ХРАНИМ ПАРОЛЬ В ОТКРЫТОМ ВИДЕ 
    $_POST['password_confirm'] = md5($_POST['password_confirm']);
    $passwordConfirm = ($_POST['password_confirm']);
    $email = $_POST['email'];
    $fullName = $_POST['full_name'];
    $registerFormData = $_POST;


    //ПРОВЕРКА ВВЕДЕННЫХ ДАННЫХ
    /* СНАЧАЛА ПРОВЕРЯЕМ ДАННЫЕ НА КОРРЕКТНОСТЬ,
    ** ПОТОМ ПРОВЕРЯЕМ ЕСТЬ ЛИ ТАКИЕ ДАННЫЕ В БАЗЕ,
    ** ИНАЧЕ ЗАЧЕМ ТРЕВОЖИТЬ БАЗУ ЕСЛИ ДАННЫЕ НЕ СООТВЕТСВУЮТ ТРЕБОВАНИЯМ ДЛЯ ВВОДА В ФОРМУ 
    */

    // СОЗДАЕМ ОБЪЕКТ ДЛЯ РЕГИСТРАЦИИ ПОЛЬЗОВАТЕЛЯ
    $registration = new Registration($login, $password, $passwordConfirm, $email, $fullName);
    $registration->informationChecking($login, $password, $email, $passwordConfirm, $fullName);
    // СОЗДАЕМ ОБЪЕКТ CRUD-КЛАССА ДЛЯ РАБОТЫ С БАЗОЙ ДАННЫХ
    $crudjson = new CRUDJSON;
    // ЕСЛИ ОШИБКИ ЕСТЬ ОТПРАВЛЯЕМ ИХ ОБРАТНО
    if (!empty($registration->errors)) {
        $registration->getErrors();
    } else {
        // ЕСЛИ ОШИБОК НЕТ - ЗАПИСЫВАЕМ ДАННЫЕ В БАЗУ, УСТАНАВЛИВАЕМ КУКИ  И ВОЗВРАЩАЕМ ПУСТОЙ МАССИВ
        $crudjson->createNewEntry($registerFormData);
        setcookie('login', $registerFormData['login'], time() + 3600 * 24, '/');
        $registration->getErrors();
    }
}
