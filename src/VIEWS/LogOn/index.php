<?php
require_once __DIR__.'/IsConnected.php';
require_once __DIR__.'/../../Config/config.php';
require_once __DIR__.'/../PageBase/PageBaseA.php';
require_once __DIR__.'/../../MODELS/Repositories/MODELS.Repositories.base.php';


echo config::GetMENUSTYLE();
echo '<div class="top-bar"><CENTER><H1 style="margin-top:7px; color:#2da2c8">APPLICATION EDYCEM</H1></Center></div>';




if (isset($_GET['debug'])){
	if ($_GET['debug'] == 1){
		echo "<br /> Serveur : " . config::$PARAM_HOST . "<br />Base de données : " . BaseRepository::GetDBName();
	}
}

?>
