<?php
require_once __DIR__.'/../IsConnected.php';
require_once __DIR__.'/../../../Config/config.php';
require_once __DIR__.'/../../PageBase/PageBaseA.php';


echo config::GetMENUSTYLE();
echo '<div class="top-bar"><CENTER><H1 style="margin-top:7px; color:#2da2c8">AJOUT D\'UN UTILISATEUR</H1></Center></div>'  ?>

<head>
  <meta charset="UTF-8">
  <title>Ajout d'un utilisateur</title>
  <link rel="stylesheet" href="../../Style/StyleForm/css/style.css">
</head>

<body>

	  	<link rel="stylesheet" href="../../Style/Ariane/ariane.css">



  
		<div class="body">			
		
			<!-- Red color scheme -->
			<form action="Action/User.php" method="POST" class="sky-form" />
				<header>INFORMATIONS GENERALES</header>
				
				<fieldset>
					<section>
						<label class="label">Identifiant</label>
						<label class="input">
							<input type="text" name="User_ID" placeholder="Entrer l'identifiant de connexion de l'utilisateur" required />
						</label>
						
					</section>

					<section>
						<label class="label">PASSWORD</label>
						<label class="input">
							<input type="password" name="Password" placeholder="Entrer le mot de passe de l'utilisateur" required />
						</label>
					</section>


					<section>
						<label class="label">NOM</label>
						<label class="input">
							<input type="text" name="Nom" placeholder="Entrer le nom de l'utilisateur" />
						</label>
					</section>

					<section>
						<label class="label">PRENOM</label>
						<label class="input">
							<input type="text" name="Prenom" placeholder="Entrer le prénom de l'utilisateur" />
						</label>
					</section>

					
								
					
        </fieldset>
        <footer>
            <button type="submit" class="button" style="width: 100%">AJOUTER</button>
        </footer>
        </form>
		</div>
</body>

</html>
