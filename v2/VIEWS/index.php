<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$valueIdForTestIndex = 0;
if (isset($_SESSION['Edycem_IDUSER'])){
  $valueIdForTestIndex = $_SESSION['Edycem_IDUSER'];
}
if ($valueIdForTestIndex != 0){
	header('location:http://'. $_SERVER['HTTP_HOST'] .'/VIEWS/LogOn/index.php');
}

require_once __DIR__.'/../Config/config.php';
require_once __DIR__.'/PageBase/PageBaseA.php';


echo config::GetMENUSTYLE();
echo '<div class="top-bar"><Center><H1 style="margin-top:7px; color:#2da2c8">APPLICATION EDYCEM</H1></Center></div>'  ?>


<head>
  <meta charset="UTF-8">
  <title>Connexion</title>
  
      <link rel="stylesheet" href="Style/StyleLogIn/css/style.css">

  
</head>

<body>

  <form action="LogOn/ToLogUser.php" method="POST">
  <input type="text" name ="utilisateur_id" placeholder="Identifiant" />
  <input type="password" name="utlisateur_password" placeholder="Mot de passe" />
  <button>Connexion</button>
</form>
  
  

</body>

</html>
