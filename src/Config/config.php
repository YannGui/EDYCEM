<?php

class config
{

	//MISC
	public static $SITETITLENAME = "Edycem";


	public static $HTTP_HOST_EDYCEM = "localhost";

	//LINKS
	public static function GetBaseURL()
	{
		return "http://" . $_SERVER['HTTP_HOST'] . "/VIEWS/DataAccess/";
	}

	//BDD
	public static $PARAM_DBHOST = 'localhost';

	public static $PARAM_DBNAME = 'edycem';

	public static $PARAM_DBUSER = 'root';

	public static $PARAM_DBPWD = '';

	public static function GetMENUSTYLE()
	{
		return "<link rel=\"stylesheet prefetch\" href=\"http://" . $_SERVER["HTTP_HOST"] . "/VIEWS/Style/css/uikit.almost-flat.css\"> <link rel=\"stylesheet\" href=\"http://" . $_SERVER["HTTP_HOST"] . "/VIEWS/Style/css/style.css\"><script src=\"http://" . $_SERVER["HTTP_HOST"] . "/VIEWS/Style/js/jquery.min.js\"></script><script  src=\"http://" . $_SERVER["HTTP_HOST"] . "/VIEWS/Style/js/index.js\"></script>";
   	}

}

?>