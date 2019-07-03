<?php

require_once __DIR__.'/../../MODELS/Repositories/MODELS.Repositories.user.php';

if (session_status() == PHP_SESSION_NONE) 
{
    session_start();
}

$valueId = 0;

if (isset($_SESSION['Edycem_IDUSER']))
{
  $valueId = $_SESSION['Edycem_IDUSER'];
}

if (count(userRepository::GetUser($valueId)) != 1)
{
	header('location:Disconnect.php');
}

?>