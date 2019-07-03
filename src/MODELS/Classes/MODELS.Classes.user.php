<?php

require_once __DIR__.'/../Repositories/MODELS.Repositories.user.php';

class user
{
	
	#region Properties

	public $identifiant;

	public $User_ID;

	public $Password;

	public $Nom;

	public $Prenom;


	#endregion



	#region Constructor

	public function __construct() 
	{
		$this->identifiant = 0;
	}

	#endregion



	#region Functions

	public function Save()
	{
		return userRepository::SetUser($this);
	}



	#endregion

}

?>