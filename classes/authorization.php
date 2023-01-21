<?php

class Authorization
{
    protected $login;
    protected $password;

    public $errors = [];

    public function __construct($login, $password)
    {
        $this->login = $login;
        $this->password = $password;
    }

    // ПРОВЕРКА ДАННЫХ
    public function authInformationChecking($login, $password)
    {
        // ПРОВЕРКА ПРАВИЛЬНОСТИ ВВЕДЕННОГО ЛОГИНА
        if (strlen($login) < 6) {
            $this->errors['loginError'] = 'слишком короткий логин';
        }
        // ПРОВЕРКА ПРАВИЛЬНОСТИ ВВЕДЕННОГО ПАРОЛЯ

        if (
            strlen($password) <= 6 ||
            preg_match("/([0-9]+[a-z]+)|([a-z]+[0-9]+)/i", $password) == 0
        ) {
            $this->errors['passwordError'] = 'это неподходящий пароль';
        }
    }

    public function getErrors()
    {
        $this->errors = json_encode($this->errors, JSON_UNESCAPED_UNICODE);
        print_r($this->errors);
    }

    //?????????/
    public function noErrors()
    {
        $this->errors = json_encode($this->errors, JSON_UNESCAPED_UNICODE);
        print_r($this->errors);
    }
}
