# ABCPHP v1.3

**ABCPHP** is an open source PHP framwork based on [php-mvc](https://github.com/panique/php-mvc), the main purpose is to build an **international** website.

##Installation
1. First, `git clone` this project into your website folder.

    	git clone https://github.com/galwaycat00/ABCPHP.git

2. Edit profile of php  `php.ini`, enable `gettext`.

    	extension=php_gettext.dll

3. Change the .htaccess file from

		RewriteBase /ABCPHP/

	to where you put this project, relative to the web root folder (usually /var/www). So when you put this project into the web root, like directly in /var/www, then the line should look like or can be commented out:
    
		RewriteBase /

	If you have put the project into a sub-folder, then put the name of the sub-folder here:

		RewriteBase /sub-folder/

4. Open the ABCPHP/Conf/constant.php, add or edit constant what you want in this file, all constants wiil be loaded when you booting your web app.

        error_reporting(E_ALL);
	    ini_set("display_errors", 1);
	    define('ROOT_URL', 'http://127.0.0.1/ABCPHP/'); // 网站根目录URL地址
	    define('APP_PATH', './Application/');// 应用根目录地址

5. Open the ABCPHP/Conf/config.php, change these lines.

    	'DB_TYPE' => 'mysql', // 数据库类型
	    'DB_HOST' => '127.0.0.1', // 服务器地址
	    'DB_NAME' => 'php-mvc', // 数据库名
	    'DB_USER' => 'root', // 用户名
	    'DB_PWD' => 'root', // 密码
	    'DB_PORT' => '3306' // 端口

	to your database credentials. If you don't have an empty database, create one. Only change the type mysql if you know what you are doing.

##A quickstart tutorial
You can enter the following URL in your browser after completing the above steps.

	http://127.0.0.1/ABCPHP/en/Index/index/123
The URL access rules:

	http://serverHost/lang/module/controller/action/[arg1/arg2/...]

##Structure
###1.Project
    WWW			 	 网站根目录
    ├─ABCPHP 		 ABCPHP框架目录
    ├─Application	 应用目录
    ├─Public		 公共资源目录
    ├─index.php		 入口文件
	├─.htaccess      分布式配置文件

###2.Framework
    ABCPHP		 				ABCPHP框架目录
    ├─Common 					公共函数目录
    │ └─function.php 
    ├─Conf	 				 	配置文件目录
    │ └─config.php 
    ├─Library					系统类库
    │ ├─ABC						ABC核心类库
    │ │	├─Controller.class.php	控制器类
    │ │	├─Model.class.php		模型类
    │ │	└─...					其他核心类
    │ ├─Org						工具类库
    │ └─...						其他更多类库
    └─ABC.php		 框架入口类

###3.Application
    Application 	 默认应用目录（可以设置）
    ├─en	 		 英语模块
    ├─ja	 		 日语模块
    ├─de			 德语模块
    ├─...			 其他更多模块

每个模块是相对独立的，其目录结构如下：

	├─Module							模块目录       
	│  ├─Common							公共函数目录
	│  │ └─function.php
	│  ├─Conf							配置文件目录
	│  │ └─config.php 
	│  ├─Controller  					控制器目录
	│  │ ├─IndexController.class.php
	│  │ ├─HomeController.class.php
	│  │ └─...							更多控制器类
	│  ├─Model							模型目录
	│  │ ├─SongsModel.class.php
	│  │ ├─UsersModel.class.php
	│  │ └─...							更多数据库模型类
	│  ├─View							视图目录
	│  │ ├─Index_index.html
	│  │ ├─Index_songs.html
	│  │ ├─Home_index.html
	│  │ └─...							更多视图
