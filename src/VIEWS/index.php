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
/*require_once __DIR__.'/PageBase/PageBaseA.php';*/


echo config::GetMENUSTYLE();
echo '<center><img src="images/EDYCEM_GROUPE_V_RVB.png" alt="logo de d\'Edycem" width="300" height="250" class="logo" ></center>'  ?>


<head>
  <meta charset="UTF-8">
  <title>Connexion</title>
  
      <link rel="stylesheet" href="Style/StyleLogIn/css/style.css">

  
</head>

<body>

  <form action="LogOn/ToLogUser.php" method="POST">
  <input type="text" name ="User_ID" placeholder="Identifiant" />
  <input type="password" name="Password" placeholder="Mot de passe" />
  <button>Connexion</button>
</form>
  
  

</body>

</html>
