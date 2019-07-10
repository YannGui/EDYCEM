<?php
//se déconnecter
session_start();

$_SESSION['Edycem_IDUSER'] = 0;
$_SESSION['ouvertU'] = false;

//détruit la session active
session_destroy();

//redirection
header('location:../../index.php');

?>