<?php
class CRUDJSON
{
    public $filename = 'database.json';
    public $jsonArray = [];
    public $result = [];

    function __construct()
    {
    }

    private function jsonFileExist($filename)
    {
        //Если файл существует - получаем его содержимое
        if (file_exists($filename)) {
            $json = file_get_contents($this->filename);
            $jsonArray = json_decode($json, true);
            return $jsonArray;
        }
    }

    // делаем запись в файл JSON
    public function createNewEntry($registerFormData)
    {
        if (file_exists('database.json')) {
            $json = file_get_contents('database.json');
            $jsonArray = json_decode($json, true);
        }
        // Делаем запись в файл
        if ($registerFormData['login']) {
            $jsonArray[] = $registerFormData;
            // TODO ЧТО ДЕЛАЕТ СЛЕДУЮЩАЯ СТРОКА
            file_put_contents('database.json', json_encode($jsonArray, JSON_FORCE_OBJECT | JSON_NUMERIC_CHECK));
        }
    }

    // МЕТОД ДЛЯ ПРОВРЕКИ ЕСТЬ ЛИ ДАННЫЕ В БАЗЕ
    public function checkInfo($registerFormData)
    {
        if (file_exists('database.json')) {
            $json = file_get_contents('database.json');
            $jsonArray = json_decode($json, true);

            if (isset($registerFormData['auth-login'])) {
                foreach ($jsonArray as $key => $value) {
                    // ЕСЛИ ЕСТЬ ДАННЫЕ В БАЗЕ УСТАНАВЛИВАЕМ КУКИ И ВОЗВРАЩЕМ ДАННЫЕ
                    if (($value['login'] == $registerFormData['auth-login']) && ($value['password'] == $registerFormData['auth-password'])) {
                        setcookie('login', $registerFormData['auth-login'], time() + 3600 * 24, '/');
                        $this->result['success'] = true;
                        $this->result = json_encode($this->result, JSON_UNESCAPED_UNICODE);
                        print_r($this->result);
                    } else {
                        $this->result['success'] = false;
                        $this->result = json_encode($this->result, JSON_UNESCAPED_UNICODE);
                        print_r($this->result);
                    }
                }
            }
        }
    }
}
