<?php
// 语言设置
function setLang($lang)
{
    putenv("LC_ALL=$lang");
    setlocale(LC_ALL, $lang);
    $domain = 'abc';
    bindtextdomain($domain, "Public/locale");
    bind_textdomain_codeset($domain, 'UTF-8');
    textdomain($domain);
}

// 获取网页内容
function get_content($url)
{
    $ch = curl_init();
    $timeout = 5;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $contents = '<div id="content" class="container">';
    $contents .= curl_exec($ch);
    $contents .= '</div>';
    curl_close($ch);
    echo $contents;
}

/**
 * 优雅的打印数组
 * @param array $var 数组
 * @param string $echo
 * @param string $label
 * @param string $strict
 * @return NULL|string
 */
function dump($var, $echo = true, $label = '<pre>', $strict = false)
{
    $label = ($label === null) ? '' : rtrim($label) . ' ';
    if (! $strict) {
        if (ini_get('html_errors')) {
            $output = print_r($var, true);
            $output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
        } else {
            $output = $label . print_r($var, true);
        }
    } else {
        ob_start();
        var_dump($var);
        $output = ob_get_clean();
        if (! extension_loaded('xdebug')) {
            $output = preg_replace('/\]\=\>\n(\s+)/m', '] => ', $output);
            $output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
        }
    }
    if ($echo) {
        echo ($output);
        return null;
    } else
        return $output;
}

function U($url = '')
{
    $url = rtrim($url, '/');
    $url = ROOT_URL . $url;
    return $url;
}

/**
 * URL重定向
 * @param string $url 重定向的URL地址
 * @param integer $time 重定向的等待时间（秒）
 * @param string $msg 重定向前的提示信息
 * @return void
 */
function redirect($url, $time = 0, $msg = '')
{
    // 多行URL地址支持
    $url = str_replace(array(
        "\n",
        "\r"
    ), '', $url);
    if (empty($msg))
        $msg = "系统将在{$time}秒之后自动跳转到{$url}！";
    if (! headers_sent()) {
        // redirect
        if (0 === $time) {
            header('Location: ' . $url);
        } else {
            header("refresh:{$time};url={$url}");
            echo ($msg);
        }
        exit();
    } else {
        $str = "<meta http-equiv='Refresh' content='{$time};URL={$url}'>";
        if ($time != 0)
            $str .= $msg;
        exit($str);
    }
}