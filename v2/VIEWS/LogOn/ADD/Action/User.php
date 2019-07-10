<?php
    //require_once __DIR__.'/../Manage/IsConnected.php';
	require_once __DIR__.'/../../../../MODELS/Repositories/MODELS.Repositories.user.php';

	//Ajout d'un utilisateur.
		$userToAdd = new user();
        $userToAdd->User_ID = $_POST["User_ID"];
        $userToAdd->Password = $_POST["Password"];
        $userToAdd->Nom = $_POST["Nom"];
        $userToAdd->Prenom = $_POST["Prenom"];
        $userToAdd->Save();
        header("location:../../DASHBOARD/User.php");

?>