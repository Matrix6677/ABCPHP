<?php

/**
 * ABC框架入口类
 */
class ABC
{
    private $url_lang = 'en'; // 语言，默认为英语
    private $url_controller = null; // 控制器
    private $url_action = null; // 动作方法
    private $url_parameter_1 = null;
    private $url_parameter_2 = null;
    private $url_parameter_3 = null;
    public static $config = array();

    public function __construct()
    {
        include './ABCPHP/Common/function.php'; // 加载系统核心函数库
        include './ABCPHP/Conf/constant.php'; // 加载系统常量
        self::$config = include './ABCPHP/Conf/config.php'; // 加载系统配置
        include './ABCPHP/Library/ABC/Controller.class.php'; // 加载控制器
        $this->splitUrl(); // URL分离
        setLang($this->url_lang); // 设置语言
        if (file_exists(APP_PATH . $this->url_lang . '/Controller/' . $this->url_controller . 'Controller.class.php')) {
            include APP_PATH . $this->url_lang . '/Controller/' . $this->url_controller . 'Controller.class.php';
            if (file_exists(APP_PATH . $this->url_lang . '/Conf/config.php')) {
                self::$config = array_merge(self::$config, include APP_PATH . $this->url_lang . '/Conf/config.php');
            }
            $this->url_controller .= 'Controller';
            $this->url_controller = new $this->url_controller($this->url_lang);
            if (method_exists($this->url_controller, $this->url_action)) {
                if (isset($this->url_parameter_3)) {
                    $this->url_controller->{$this->url_action}($this->url_parameter_1, $this->url_parameter_2, $this->url_parameter_3);
                } elseif (isset($this->url_parameter_2)) {
                    $this->url_controller->{$this->url_action}($this->url_parameter_1, $this->url_parameter_2);
                } elseif (isset($this->url_parameter_1)) {
                    $this->url_controller->{$this->url_action}($this->url_parameter_1);
                } else {
                    $this->url_controller->{$this->url_action}();
                }
            } else {
                redirect(U($this->url_lang . '/Index/index'));
            }
        } else 
            if (file_exists(APP_PATH . $this->url_lang . '/Controller/IndexController.class.php')) {
                include APP_PATH . $this->url_lang . '/Controller/IndexController.class.php';
                $index = new IndexController($this->url_lang);
                $index->index();
            } else {
                redirect(U('en/Index/index'), 3, '指向错误，3秒后将自动跳到首页！');
            }
    }

    /**
     * 字符串截取
     */
    private function splitUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            $this->url_lang = (isset($url[0]) ? $url[0] : null);
            $this->url_controller = (isset($url[1]) ? $url[1] : null);
            $this->url_action = (isset($url[2]) ? $url[2] : null);
            $this->url_parameter_1 = (isset($url[3]) ? $url[3] : null);
            $this->url_parameter_2 = (isset($url[4]) ? $url[4] : null);
            $this->url_parameter_3 = (isset($url[5]) ? $url[5] : null);
        }
    }
}
