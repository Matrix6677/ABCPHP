<?php

/**
 * 系统控制器
 */
class Controller
{
    public $db = null;
    public $url_lang = null;

    function __construct($url_lang = 'en')
    {
        $this->url_lang = $url_lang;
        $this->openDatabaseConnection();
    }
    
    // 连接数据库
    private function openDatabaseConnection()
    {
        $options = array(
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        );
        $this->db = new PDO(ABC::$config['DB_TYPE'] . ':host=' . ABC::$config['DB_HOST'] . ';port=' . ABC::$config['DB_PORT'] . ';dbname=' . ABC::$config['DB_NAME'], ABC::$config['DB_USER'], ABC::$config['DB_PWD'], $options);
    }

    /**
     * 加载数据库模型
     * @param string 模型名称
     * @return 模型对象
     */
    public function loadModel($model_name)
    {
        $model_name .= 'Model';
        require APP_PATH . $this->url_lang . '/Models/' . $model_name . '.class.php';
        return new $model_name($this->db);
    }
}
