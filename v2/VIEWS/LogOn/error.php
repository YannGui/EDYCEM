<?php
require_once __DIR__.'/IsConnected.php';
require_once __DIR__.'/../../Config/config.php';
require_once __DIR__.'/../PageBase/PageBaseA.php';


echo config::GetMENUSTYLE();
echo '<div class="top-bar"><CENTER><H1 style="margin-top:7px; color:#2da2c8">APPLICATION FOOD</H1></Center></div>'  ?>

<head>
  <meta charset="UTF-8">
  <title>Ajout d'un utilisateur</title>
  <link rel="stylesheet" href="../Style/StyleForm/css/style.css">
</head>

<body>
	<div class="body">			
		<form action="Action/Building.php" method="post" class="sky-form" />
			<header>vous ne possédez pas les droits nécessaires pour accéder à cette page, si vous avez besoin de consulter cette page contacter un administrateur.</header>


        </form>
	</div>
</body>

</html>

