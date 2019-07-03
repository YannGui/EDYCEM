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
			$request = $conn->prepare("SELECT identifiant, User_ID, Password, Nom, Prenom FROM user WHERE identifiant = :identifiant");

			//Mappage des champs variables
			$request->bindValue('identifiant', $id, PDO::PARAM_INT);

			//Execution
			$request->execute();

			//Récupération des données dans une var
			$results = $request->fetchAll();

			//Récupération
			foreach ($results as $result) 
			{
				$item = new user();

				$item->identifiant = $result['identifiant'];
				$item->User_ID = $result['User_ID'];
				$item->Password = $result['Password'];
				$item->Nom = $result['Nom'];
				$item->Prenom = $result['Prenom'];

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
		$request = $conn->prepare("SELECT identifiant, User_ID, Password, Nom, Prenom FROM user");

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

				$item->identifiant = $result['identifiant'];
				$item->User_ID = $result['User_ID'];
				$item->Password = $result['Password'];
				$item->Nom = $result['Nom'];
				$item->Prenom = $result['Prenom'];

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
			$request = $conn->prepare("INSERT INTO user(User_ID, Password, Nom, Prenom) VALUES (:User_ID, :Password, :Nom, :Prenom)");

			//Mappage des champs variables
			$request->bindValue('User_ID', $user->User_ID, PDO::PARAM_STR);
			$request->bindValue('Password', encryption::Encrypt($user->Password), PDO::PARAM_STR);
			$request->bindValue('Nom', $user->Nom, PDO::PARAM_STR);
			$request->bindValue('Prenom', $user->Prenom, PDO::PARAM_STR);

			if ($request->execute())
			{
				return 1;
			}
		}

		else
		{
			//UPDATE
			//Instanciation de la requête
			$request = $conn->prepare("UPDATE user SET User_ID = :User_ID, Nom = :Nom, Prenom = :Prenom WHERE identifiant = :identifiant");

			//Mappage des champs variables
			$request->bindValue('identifiant', $user->identifiant, PDO::PARAM_INT);
			$request->bindValue('User_ID', $user->User_ID, PDO::PARAM_STR);
			$request->bindValue('Nom', $user->Nom, PDO::PARAM_STR);
			$request->bindValue('Prenom', $user->Prenom, PDO::PARAM_STR);
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

		$request = $conn->prepare("UPDATE user SET Password = :Password WHERE identifiant = :identifiant");

			//Mappage des champs variables
			$request->bindValue('identifiant', $id, PDO::PARAM_INT);
			$request->bindValue('Password', encryption::Encrypt($Password), PDO::PARAM_STR);

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
			$request = $conn->prepare("DELETE FROM user WHERE identifiant = :identifiant");

			//Mappage des champs variables
			$request->bindValue('identifiant', $userid, PDO::PARAM_INT);

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

	public static function GetLogin($User_ID, $Password)
	{
		//Création de la co
		$conn = parent::CreateConnexion();
	
		//Instanciation de la requête
		$request = $conn->prepare("SELECT identifiant FROM user WHERE User_ID = :User_ID AND Password = :Password");

		//Mappage des champs variables
		$request->bindValue('User_ID', $User_ID, PDO::PARAM_STR);
		$request->bindValue('Password', encryption::Encrypt($Password), PDO::PARAM_STR);

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
					return $result['identifiant'];
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