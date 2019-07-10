<?php
require_once __DIR__.'/../IsConnected.php';
require_once __DIR__.'/../../../MODELS/Repositories/MODELS.Repositories.user.php';
require_once __DIR__.'/../../../Config/config.php';
require_once __DIR__.'/../../PageBase/PageBaseA.php';

echo config::GetMENUSTYLE();
 echo '<div class="top-bar"><CENTER><H1 style="margin-top:7px; color:#2da2c8">MODIFICATION UTILISATEUR</H1></Center></div>'; 

 ?>

  </head>
      <link rel="stylesheet" href="../../Style/Ariane/ariane.css">
      <link rel="stylesheet" href="../../Style/StyleForm/css/style.css">

    <center><div class="breadcrumb flat">
      <a class="active" >Modification d'un utlisateur</a>
      <a>Terminer</a>
    </div></center>

<?php

$id = userRepository::GetUser($_GET['id']);

foreach ($id as $ids) 
{
	$ids->identifiant;
	$ids->User_ID;
	$ids->Password;
	$ids->Nom;
	$ids->Prenom;

}

echo '<body>
	  	<div class="body">			
			<form action="Save/SaveUser.php?id='.$ids->identifiant.'" method="POST" class="sky-form" />
				<header>INFORMATIONS GENERALES</header>
				
				<fieldset>
					<section>
						<label class="label">Identifiant de connexion</label>
						<label class="input">
							<input type="text" name="User_ID" placeholder="identifiant de connexion " value="'.$ids->User_ID.'" required/>
						</label>
						
					

					<section>
						<label class="label">PASSWORD</label>
						<label class="input">
							<input type="password" name="Password" placeholder="Ne pas renseigner si le mot de passe reste identique"/>
						</label>
					</section>

					</section>
					<section>
						<label class="label">NOM</label>
						<label class="input">
							<input type="text" name="Nom" placeholder="Saisir le Nom " value="'.$ids->Nom.'" required/>
						</label>
					</section>

					<section>
						<label class="label">Prenom</label>
						<label class="input">
							<input type="text" name="Prenom" placeholder="Saisir le Prenom" value="'.$ids->Prenom.'" required/>
						</label>
					</section>


					

					<section>
	                <label class="label">ADMINISTRATEUR</label>
	                <div class="inline-group">';



echo'								
        </fieldset>
        <footer>
            <button type="submit" class="button" style="width: 100%">SAUVEGARDER</button>
        </footer>
        

		'; ?>


</form>
 <link rel="stylesheet" href="../../Style/StyleDashboard/css/style.css">


       
		

