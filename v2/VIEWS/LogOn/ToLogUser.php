<?php
require_once __DIR__.'/../../MODELS/Repositories/MODELS.Repositories.user.php';


$connected = false;
$returnID = userRepository::GetLogin($_POST['utilisateur_id'], $_POST['utlisateur_password']);


if ($returnID > 0)
	{	
		$connected = true;	
		session_start();
		$_SESSION['Edycem_IDUSER'] = $returnID;

		$_SESSION['ouvertU'] = true;
		header('location:index.php');
	}

	else if ($returnID == 0)
	{
		header('location:../index.php');
	}

	else if ($returnID == -1)
	{
		echo 'Crash dans l\'execution de la requête';
	}

	else if ($returnID == -2)
	{
		echo 'Plus d\'un user avec ce user mdp';
	}

	else
	{
		echo 'Erreur non gérée';
	}


?>