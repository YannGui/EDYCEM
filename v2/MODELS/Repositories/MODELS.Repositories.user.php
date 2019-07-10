<?php

require_once __DIR__.'/../Classes/MODELS.Classes.user.php';
require_once __DIR__.'/MODELS.Repositories.base.php';
require_once __DIR__.'/../../Helpers/encryption.php';

class userRepository extends BaseRepository
{

	#region BASE CRUD (Create Read Update Delete)

	public static function GetUser($id)
	{
		return userRepository::GetUsers(array($id));
	}

	public static function GetUsers($ids)
	{
		$toReturn = array();

		foreach ($ids as $id)
		{
			//Création de la co
			$conn = parent::CreateConnexion();
			//Instanciation de la requête
			$request = $conn->prepare("SELECT ID, utilisateur_id, utlisateur_password, utilisateur_nom, utilisateur_prenom, utilisateur_RGPD FROM utilisateur WHERE ID = :ID");

			//Mappage des champs variables
			$request->bindValue('ID', $id, PDO::PARAM_INT);

			//Execution
			$request->execute();

			//Récupération des données dans une var
			$results = $request->fetchAll();

			//Récupération
			foreach ($results as $result) 
			{
				$item = new user();

				$item->ID = $result['ID'];
				$item->utilisateur_id = $result['utilisateur_id'];
				$item->utlisateur_password = $result['utlisateur_password'];
				$item->utilisateur_nom = $result['utilisateur_nom'];
				$item->utilisateur_prenom = $result['utilisateur_prenom'];
				$item->utilisateur_prenom = $result['utilisateur_RGPD'];

				array_push($toReturn, $item);
			}
		}

		return $toReturn;		
	}

	public static function GetAllUsers()
	{
		$toReturn = array();

		//Création de la co
		$conn = parent::CreateConnexion();
	
		//Instanciation de la requête
		$request = $conn->prepare("SELECT ID, utilisateur_id, utlisateur_password, utilisateur_nom, utilisateur_prenom, utilisateur_RGPD FROM utilisateur");

		//Mappage des champs variables
		//Pas de champs variables

		//Execution
		$request->execute();

		//Récupération des données dans une var
		$results = $request->fetchAll();

		//Récupération
		foreach ($results as $result) 
		{
			$item = new user();

				$item->ID = $result['ID'];
				$item->utilisateur_id = $result['utilisateur_id'];
				$item->utlisateur_password = $result['utlisateur_password'];
				$item->utilisateur_nom = $result['utilisateur_nom'];
				$item->utilisateur_prenom = $result['utilisateur_prenom'];
				$item->utilisateur_prenom = $result['utilisateur_RGPD'];

			array_push($toReturn, $item);
		}

		return $toReturn;
	}

	public static function SetUser($user)
	{
		//Création de la co 
		$conn = parent::CreateConnexion();

		if ($user->identifiant == 0)
		{
			//INSERT
			//Instanciation de la requête
			$request = $conn->prepare("INSERT INTO utilisateur(ID, utilisateur_id, utlisateur_password, utilisateur_nom, utilisateur_prenom, utilisateur_RGPD) VALUES (:ID, :utilisateur_id, :utlisateur_password, :utilisateur_nom, :utilisateur_prenom , :utilisateur_RGPD)");

			//Mappage des champs variables
			$request->bindValue('ID', $user->ID, PDO::PARAM_STR);
			$request->bindValue('utilisateur_id', $user->utilisateur_id, PDO::PARAM_STR);
			$request->bindValue('utlisateur_password', encryption::Encrypt($user->utlisateur_password), PDO::PARAM_STR);
			$request->bindValue('utilisateur_nom', $user->utilisateur_nom, PDO::PARAM_STR);
			$request->bindValue('utilisateur_prenom', $user->utilisateur_prenom, PDO::PARAM_STR);
			$request->bindValue('utilisateur_RGPD', $user->utilisateur_RGPD, PDO::PARAM_STR);

			if ($request->execute())
			{
				return 1;
			}
		}

		else
		{
			//UPDATE
			//Instanciation de la requête
			$request = $conn->prepare("UPDATE utilisateur SET utilisateur_id = :utilisateur_id, utlisateur_password = :utlisateur_password, utilisateur_nom = :utilisateur_nom, utilisateur_prenom = :utilisateur_prenom, utilisateur_RGPD = :utilisateur_RGPD WHERE ID = :ID");

			//Mappage des champs variables
			$request->bindValue('ID', $user->ID, PDO::PARAM_STR);
			$request->bindValue('utilisateur_id', $user->utilisateur_id, PDO::PARAM_STR);
			$request->bindValue('utlisateur_password', encryption::Encrypt($user->utlisateur_password), PDO::PARAM_STR);
			$request->bindValue('utilisateur_nom', $user->utilisateur_nom, PDO::PARAM_STR);
			$request->bindValue('utilisateur_prenom', $user->utilisateur_prenom, PDO::PARAM_STR);
			$request->bindValue('utilisateur_RGPD', $user->utilisateur_RGPD, PDO::PARAM_STR);
			if ($request->execute())
			{
				return 1;
			}
		}

		return -1;
	}


	public static function UpdateMDPuser($id, $password)
	{
		$conn = parent::CreateConnexion();

		$request = $conn->prepare("UPDATE utilisateur SET utlisateur_password = :utlisateur_password WHERE ID = :ID");

			//Mappage des champs variables
			$request->bindValue('ID', $user->ID, PDO::PARAM_STR);
			$request->bindValue('utilisateur_id', $user->utilisateur_id, PDO::PARAM_STR);
			$request->bindValue('utlisateur_password', encryption::Encrypt($user->utlisateur_password), PDO::PARAM_STR);
			$request->bindValue('utilisateur_nom', $user->utilisateur_nom, PDO::PARAM_STR);
			$request->bindValue('utilisateur_prenom', $user->utilisateur_prenom, PDO::PARAM_STR);
			$request->bindValue('utilisateur_RGPD', $user->utilisateur_RGPD, PDO::PARAM_STR);

			if ($request->execute())
			{
				return 1;
			}
		
		return -1;
	
	}


	public static function DeleteUser($user)
	{
		if ($user->identifiant == 0)
		{
			return 0;
		}

		else
		{
			return DeleteUserById($user->identifiant);
		}
		return -1;
	}

	public static function DeleteUserById($userid)
	{
		//Création de la co 
		$conn = parent::CreateConnexion();

		$usersForId = userRepository::GetUser($userid);

		if (count($usersForId) == 1)
		{
			//UPDATE
			//Instanciation de la requête
			$request = $conn->prepare("DELETE FROM utiisateur WHERE ID = :ID");

			//Mappage des champs variables
			$request->bindValue('ID', $userid, PDO::PARAM_INT);

			if ($request->execute())
			{
				return 1;
			}
		}

		else
		{
			return count($usersForId);
		}

		return -1;
	}

	public static function GetLogin($utilisateur_id, $utlisateur_password)
	{
		//Création de la co
		$conn = parent::CreateConnexion();
	
		//Instanciation de la requête
		$request = $conn->prepare("SELECT ID FROM utilisateur WHERE utilisateur_id = :utilisateur_id AND utlisateur_password = :utlisateur_password");

		//Mappage des champs variables
		$request->bindValue('utilisateur_id', $utilisateur_id, PDO::PARAM_STR);
		$request->bindValue('utlisateur_password', encryption::Encrypt($utlisateur_password), PDO::PARAM_STR);

		//Execution
		if ($request->execute())
		{
			//Récupération des données dans une var
			$results = $request->fetchAll();

			$count = count($results);

			if ($count == 0)
			{
				return 0;
			}

			else if ($count > 1)
			{
				return -2;
			}

			else
			{
				//Récupération
				foreach ($results as $result) 
				{
					return $result['ID'];
				}
			}
		}
		return -1;

		
	}



	#endregion

	#region Specifics funcs

	
	#endregion

}

?>