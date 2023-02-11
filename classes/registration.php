<?php

class Registration
{
    protected $login;
    protected $password;
    protected $passwordConfirm;
    protected $email;
    protected $fullName;
    public $errors = [];

    public function __construct($login, $password, $passwordConfirm, $email, $fullName)
    {
        $this->login = $login;
        $this->password = $password;
        $this->passwordConfirm = $passwordConfirm;
        $this->email = $email;
        $this->fullName = $fullName;
        // $this->errors = 0;
    }

    // ПРОВЕРКА ДАННЫХ
    public function informationChecking($login, $password, $email, $passwordConfirm, $fullName)
    {
        // ПРОВЕРКА ПРАВИЛЬНОСТИ ВВЕДЕНОГО ЛОГИНА
        if (strlen($login) < 6) {
            $this->errors['loginError'] = 'слишком короткий логин';
        }

        // ПРОВЕРКА ПРАВИЛЬНОСТИ ВВЕДЕНОГО ПАРОЛЯ
        if (
            strlen($password) <= 6 &&
            preg_match("/^(?=.*[a-z])(?=.*[0-9])(?=.*[^\w\s]).{6,}/", $password) == 0
        ) {
            $this->errors['passwordError'] = 'это неподходящий пароль';
        }

        // ПРОВЕРКА ПРАВИЛЬНОСТИ ВВЕДЕНОГО ПОВТОРНО ПАРОЛЯ
        if (
            $password !== $passwordConfirm
        ) {
            $this->errors['passwordConfirmError'] = 'пароли не совпадают';
        }
        // TODO ПРОВЕРКА ПОЧТЫ НА НАЛИЧИЕ СИМВОЛА СОБАЧКИ

        if (
            strpos($email, '.') == false
        ) {
            $this->errors['emailError'] = 'некорректный email';
        }
        // ПРОВЕРКА ПРАВИЛЬНОСТИ ВВЕДЕНОГО ИМЕНИ

        if (
            strlen($fullName) < 2
        ) {
            $this->errors['fullNameLengthError'] = 'слишком короткое имя';
        }
        if (
            !ctype_alpha($fullName)
        ) {
            $this->errors['fullNameStructureError'] = 'в имени должны быть только буквы';
        }
        if (
            strpos($login, ' ') !== false ||
            strpos($password, ' ') !== false ||
            strpos($passwordConfirm, ' ') !== false ||
            strpos($email, ' ') !== false ||
            strpos($fullName, ' ') !== false
        ) {
            $this->errors['spaceError'] = 'в полях формы не должно быть пробелов';
        }
    }

    public function getErrors()
    {
        $this->errors = json_encode($this->errors, JSON_UNESCAPED_UNICODE);
        print_r($this->errors);
    }

    public function noErrors()
    {
        $this->errors = json_encode($this->errors, JSON_UNESCAPED_UNICODE);
        print_r($this->errors);
    }
}
