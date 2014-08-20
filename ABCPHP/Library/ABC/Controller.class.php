<?php

class Controller
{
    public $db = null;
    public $url_lang = null;

    function __construct($url_lang = 'en')
    {
        $this->url_lang = $url_lang;
        $this->openDatabaseConnection();
    }

    private function openDatabaseConnection()
    {
        $options = array(
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        );
        $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, $options);
    }

    public function loadModel($model_name)
    {
        $model_name .= 'Model';
        require APP_PATH . $this->url_lang . '/Models/' . $model_name . '.class.php';
        return new $model_name($this->db);
    }
}
