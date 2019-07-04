<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=edycem;charset=utf8', 'root', '');

}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

$reponse = $bdd->query('SELECT * FROM user');


while ($donnees = $reponse->fetch())
{
    ?>
    <p>
        User_Id : <?php echo $donnees['User_ID']; ?>
    </p>
    <?php
}

$reponse->closeCursor();


?>
