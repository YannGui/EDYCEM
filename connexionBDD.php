<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=testapi;charset=utf8', 'root', '');

}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

$reponse = $bdd->query('SELECT * FROM utilisateurs');


while ($donnees = $reponse->fetch())
{
    ?>
    <p>
        User_Id : <?php echo $donnees['User_Id']; ?>
    </p>
    <?php
}

$reponse->closeCursor();


?>
