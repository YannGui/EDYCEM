<?php

require_once __DIR__.'/../Repositories/MODELS.Repositories.user.php';

class user
{
	
	#region Properties

	public $ID;

	public $utilisateur_id;

	public $utlisateur_password;

	public $utilisateur_nom;

	public $utilisateur_prenom;

	public $utilisateur_RGPD;

	public $utilisateur_profile_ID;

	#endregion



	#region Constructor

	public function __construct() 
	{
		$this->ID = 0;
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