<?php

require_once __DIR__.'/../../Config/config.php';
require_once __DIR__.'/../../MODELS/Repositories/MODELS.Repositories.user.php';

$entete ='
        <!DOCTYPE html>
        <html lang="fr" >
        <head>
        <meta charset="UTF-8">
        <!-- Matomo -->
<script type="text/javascript">
  var _paq = _paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push([\'trackPageView\']);
  _paq.push([\'enableLinkTracking\']);
  (function() {
    var u="//stats.acinfodeveloppement.com/";
    _paq.push([\'setTrackerUrl\', u+\'piwik.php\']);
    _paq.push([\'setSiteId\', \'';

$entetefin = '\']);
    var d=document, g=d.createElement(\'script\'), s=d.getElementsByTagName(\'script\')[0];
    g.type=\'text/javascript\'; g.async=true; g.defer=true; g.src=u+\'piwik.js\'; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Matomo Code -->

        </head>';

class PageBaseFuncs
{

  public static function GetMenu($idUser)
  {
    $toReturn = '';
    $toReturn = $toReturn . '<body>
        <sidebar id="left-menu" class="left-menu">
          <ul class="uk-text-center">
          <li style="width: 56px;  height: 56px;">
              <a href="#" id="expand" class="left-menu-nav-icon">
                <i ><img src="http://'. $_SERVER['HTTP_HOST'] .'/VIEWS/Icon/MenuBleu.png"/></i>
              </a>
            </li>

            ';

          if ($_SERVER['REQUEST_URI'] == '/VIEWS/LogOn/index.php')
          {
             $toReturn = $toReturn . '<li  style="background-color: #2da2c8;">
                        <a href="http://'. $_SERVER['HTTP_HOST'] .'/VIEWS/LogOn/index.php" data-uk-smooth-scroll>
                          <i><img src="http://'. $_SERVER['HTTP_HOST'] .'/VIEWS/Icon/AccueilGris.png"/></i>
                          <span style="color: #40403F;">ACCUEIL</span>
                        </a>
                      </li>';

          }
          else
          {

              $toReturn = $toReturn . '<li>
                        <a href="http://'. $_SERVER['HTTP_HOST'] .'/VIEWS/LogOn/index.php" data-uk-smooth-scroll>
                          <i><img src="http://'. $_SERVER['HTTP_HOST'] .'/VIEWS/Icon/AccueilBleu.png"/></i>
                          <span>ACCUEIL</span>
                        </a>
                      </li>';

          }


   

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
   
   if($_SERVER['REQUEST_URI'] == '/VIEWS/LogOn/DASHBOARD/user.php' || $_SERVER['REQUEST_URI'] == '/VIEWS/LogOn/ADD/User.php' || $_SERVER['REQUEST_URI'] == '/VIEWS/LogOn/ADD/PlaceForUser.php' || substr($_SERVER['REQUEST_URI'], 0, 16) == '/VIEWS/LogOn/EDIT/user.php')
{

   $toReturn = $toReturn . '

  <li style="background-color: #2da2c8;">
    <a href="http://'. $_SERVER['HTTP_HOST'] .'/VIEWS/LogOn/DASHBOARD/user.php" >
      <i><img src="http://'. $_SERVER['HTTP_HOST'] .'/VIEWS/Icon/GroupGris.png" /></i>
      <span style="color: #40403F;">UTILISATEURS</span>
    </a>
  </li> ';

}
else
{

    $toReturn = $toReturn . '

  <li>
    <a href="http://'. $_SERVER['HTTP_HOST'] .'/VIEWS/LogOn/DASHBOARD/user.php" >
      <i><img src="http://'. $_SERVER['HTTP_HOST'] .'/VIEWS/Icon/GroupBleu.png" /></i>
      <span>UTILISATEURS</span>
    </a>
  </li> ';

}

      

    $toReturn = $toReturn . '<li>
            <a href="http://'. $_SERVER['HTTP_HOST'] .'/VIEWS/LogOn/Disconnect.php">
            <i><img src="http://'. $_SERVER['HTTP_HOST'] .'/VIEWS/Icon/ExitBleu.png" /></i>
            <span>DECONNEXION</span>
            </a>
            </li>';

    $toReturn = $toReturn . '</ul>
            </sidebar>';

    return $toReturn;
  }



}





echo $entete;
if ($_SERVER['HTTP_HOST'] == "localhost"){
  echo '5';
}
else{
  echo '5';
}
echo $entetefin;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$valueId = 0;
if (isset($_SESSION['Edycem_IDUSER'])){
  $valueId = $_SESSION['Edycem_IDUSER'];
}

echo PageBaseFuncs::GetMenu($valueId);



?>
