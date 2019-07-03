<?php
    require_once __DIR__.'/../../IsConnected.php';
    require_once __DIR__.'/../../../../MODELS/Repositories/MODELS.Repositories.user.php';


    //Ajout d'un utilisateur.
        $userToAdd = new user();
        $userToAdd->identifiant = $_GET["id"];
        $userToAdd->User_ID = $_POST["User_ID"];
        $userToAdd->Password = $_POST["Password"];
        $userToAdd->Nom = $_POST["Nom"];
        $userToAdd->Prenom = $_POST["Prenom"];
        $userToAdd->Save();
        

        if($_POST["password"] != "")
        {         
          userRepository::UpdateMDPuser($_GET["id"], $_POST["Password"]);
        }

       
        header("location:../../DASHBOARD/user.php");




?>