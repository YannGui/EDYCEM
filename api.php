<?php

 $actual_link = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
// get the HTTP method, path and body of the request
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', $actual_link);

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=edycem;charset=utf8', 'root', '');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

 if (isset($request[5]))  {
     $typeMethod = $request[5];
     //echo $request[5];

     if ($method == 'GET') {
         $output=[];
         if (strstr($typeMethod, "?")){

             $param = substr( strstr($typeMethod, "?"), 1 );
             parse_str($param, $output);
         }
         if(strpos($typeMethod, "?"))$typeMethod = substr($typeMethod,0, strpos($typeMethod, "?") );
            if( $typeMethod == "users" && sizeof($output) ==0){

                $reponse = $bdd->query('SELECT * FROM user');
                while ($donnees = $reponse->fetch())
                {
                    //echo $donnees['User_ID'];
                    header('Content-Type: application/json');
                    echo json_encode( $donnees );
                }
                $reponse->closeCursor();

            }else if( $typeMethod == "users" && sizeof($output) ==1) {
                if($output["id"]) {
                    $param = $output["id"];
                    $reponse = $bdd->query("SELECT * FROM user WHERE Identifiant = ".$param. " ");
                    while ($donnees = $reponse->fetch())
                    {
                       // echo $donnees['User_ID'];
                        header('Content-Type: application/json');
                        echo json_encode( $donnees );
                    }
                    $reponse->closeCursor();
                }
            }


     } elseif ($method == 'POST') {
         //echo $method;

         if( $typeMethod == "taches") {
             $body = json_decode(file_get_contents('php://input'), true);

             $libelle = $body["Libelle"];
             $commentaires = $body["commentaires"];
             $tempsTotal = $body["Temps_Total"];
             $Date_Depart = $body["Date_Depart"];
             $Date_Fin =  $body["Date_Fin"];

             try {
                 // set the PDO error mode to exception
                 $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                 $sql = "INSERT INTO taches (Libelle, commentaires, Temps_Total, Date_Depart, Date_Fin  )
                            VALUES ('".$libelle."', '".$commentaires."', '".$tempsTotal."' ,'".$Date_Depart."', '".$Date_Fin."')";
                 // use exec() because no results are returned
                 $bdd->exec($sql);
                 echo "New taches created successfully";
             }
             catch(PDOException $e)
             {
                 echo $sql . "<br>" . $e->getMessage();
             }

             $bdd = null;
         }
//         $input = json_decode(file_get_contents('php://input'), true);
//         echo $input["Libelle"];
//         //echo mysqli_insert_id($link);
     } elseif ($method == 'DELETE') {
         echo "test delete";

     } elseif ($method == 'PUT') {
         echo "test PUT";

     }   else {
         echo "nothing";
     }


 } else {
     echo "{\"api\": \"error\"}";
 }


?>