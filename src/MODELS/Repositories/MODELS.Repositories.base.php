<?php

require_once __DIR__."/../../Config/config.php";

class BaseRepository
{

	public static function CreateConnexion()
	{

		$PARAM_DBNAME = BaseRepository::GetDBName();
		$PARAM_DBUSER = BaseRepository::GetDBUser();
		$PARAM_DBPWD = BaseRepository::GetDBPwd();
		$PARAM_DBHOST = BaseRepository::GetDBHost();

		// creation de la connexion afin d'executer les requetes
		try
		{
			return new PDO( 'mysql:host='.$PARAM_DBHOST.';dbname='.$PARAM_DBNAME, $PARAM_DBUSER, $PARAM_DBPWD );
		}

		catch ( PDOException $e )
		{
			echo "<h1>Problème de connexion a la base de données</h1>";
		}
	}

	public static function GetDBHost(){

		if ($_SERVER['HTTP_HOST'] == "localhost"){
			return config::$PARAM_DBHOST;
		}
		else{
			return "nohost";
		}
	}

	public static function GetDBName(){

		if ($_SERVER['HTTP_HOST'] == "localhost"){
			return config::$PARAM_DBNAME;
		}
		else{
			return "nodatabase";
		}
	}

	public static function GetDBUser(){

		if ($_SERVER['HTTP_HOST'] == "localhost"){
			return config::$PARAM_DBUSER;
		}
		else{
			return "nouser";
		}
	}

	public static function GetDBPwd(){

		if ($_SERVER['HTTP_HOST'] == "localhost"){
			return config::$PARAM_DBPWD;
		}
		else{
			return "nopwd";
		}
	}

}
?>
