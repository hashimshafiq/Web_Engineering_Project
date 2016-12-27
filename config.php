<?php

if(preg_match("/config.php/", $_SERVER['SCRIPT_FILENAME'])){

	die("Access Denied");
}
define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PWD", "");
define("DBNAME", "touristhelper");

if(!$link = mysql_connect(HOSTNAME,USERNAME,PWD)){

	die("Cannot connect to MySQL Server.<br>\n".mysql_error());
}

if(!mysql_select_db(DBNAME,$link)){

	die("Cannot select database.<br>\n".mysql_error());
}



?>