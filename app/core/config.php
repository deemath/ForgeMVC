<?php 

if($_SERVER['SERVER_NAME'] == 'localhost')
{
	/** database config **/
	define('DBNAME', 'forge');
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBDRIVER', '');
	
	define('ROOT', 'http://localhost/testgit mvc/public');

}else
{
	/** database config **/
	define('DBNAME', 'forge');
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBDRIVER', '');

	define('ROOT', 'https://www.yourwebsite.com');

}



define('IMAGES','http://localhost/testmvc/public/assets/images/');


define('APP_NAME', "My Webiste");
define('APP_DESC', "Best website on the planet");

/** true means show errors **/
define('DEBUG', true);
