<?php

require_once __DIR__.'/../../MODELS/Repositories/MODELS.Repositories.user.php';

$success = false;
$action = "NOACTION";
$error = "";

if (isset($_GET["action"]) || isset($_POST["action"]))
{
	if (isset($_GET["action"])){
		$action = $_GET["action"];
	}
	elseif (isset($_POST["action"])){
		$action = $_POST["action"];
	}
	

	if ($action == "Delete")
	{
		$userid = $_GET['userid'];
		$retourFonction = userRepository::DeleteUserById($userid);
		if ($retourFonction == 1)
		{
			$success = true;
		}
		else
		{
			$success = false;
			if ($retourFonction > 0)
			{
				$error = "Plus d'un utilisateur supprimé ??? Oups ...";

			}
			elseif ($retourFonction == 0) 
			{
				$error = "Aucun utilisateur supprim&eacute;. L'identifiant ne serait pas présent en base de donn&eacute;es.";
			}
			else
			{
				$error = "Erreur non gérée";
			}
		}
		echo $error;
	}
	elseif ($action == "Add")
	{
		//Ajout d'un utilisateur.
		$userToAdd = new user();
        $userToAdd->User_ID = $_POST["User_ID"];
        $userToAdd->Password = $_POST["Password"];
        $userToAdd->Nom = $_POST["Nom"];
        $userToAdd->Prenom = $_POST["Prenom"];
      
        $userToAdd->Save();
	}
	else
	{
		$error = "Action inconnue";
	}
}

echo json_encode(array("success"=>$success, "action"=>$action, "error"=>$error));

?>