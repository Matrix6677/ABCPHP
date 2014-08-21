# ABCPHP v1.2

**ABCPHP** is an open source php framwork based on [php-mvc](https://github.com/panique/php-mvc), the main purpose is to build an **international** website.

##Installation
1. First, `git clone` this project into your website folder.

    	`git clone https://github.com/galwaycat00/ABCPHP.git`

2. Edit profile of php  `php.ini`, enable `gettext`.

    	`extension=php_gettext.dll`

3. Change the .htaccess file from

		`RewriteBase /ABCPHP/`

	to where you put this project, relative to the web root folder (usually /var/www). So when you put this project into the web root, like directly in /var/www, then the line should look like or can be commented out:
    
		`RewriteBase /`

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

	http://127.0.0.1/ABCPHP/

