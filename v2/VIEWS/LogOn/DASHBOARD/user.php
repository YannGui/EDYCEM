<?php

require_once __DIR__.'/../IsConnected.php';
require_once __DIR__.'/../../../MODELS/Repositories/MODELS.Repositories.user.php';
require_once __DIR__.'/../../../Config/config.php';
require_once __DIR__.'/../../PageBase/PageBaseA.php';


echo config::GetMENUSTYLE();
echo '
<sidebar id="top-bar2" class="top-bar2">
            <div class="title"><center><H1 style="color:#2da2c8; display: inline;">UTILISATEURS</H1></center></div>
          <ul>
            <li>
              <a href="../ADD/User.php" >
                 <img src="http://'. $_SERVER['HTTP_HOST'] .'/VIEWS/Icon/Add32.png"/>
              </a>
            </li>
            </ul>

            </sidebar>';  ?>

 
    <link rel="stylesheet" href="../../Style/StyleDashboard/css/style.css">
     
     <script src='../../Style/js/CRUDFuncs.js'></script>


<div id="content">
  <div class="menu-trigger"></div>

     <!-- Base du tableau des sites -->
    <center><div class="content">

      <table>
        <thead>
          <tr>
            <th style="border-left: 1px solid #40403F;">USER_ID</th>
            <th>Nom</th>
            <th>PRENOM</th>
            <th style="width: 10%; border-right: 1px solid #40403F;"><center>ACTIONS</center></th>   
          </tr>
        </thead>


         <?php
              
              $ListUsers = userRepository::GetAllUsers(array());

            /*Tableau des utilisateurs */
                foreach ( $ListUsers as $MainUser)
                { 
                  

                  echo '<tr id="ligneid' . $MainUser->identifiant . '">';
                    echo "<td>" . $MainUser->User_ID . "</td>";
                    echo "<td>" . $MainUser->Nom . "</td>";
                    echo "<td>" . $MainUser->Prenom . "</td>";



                    echo '<td style = "padding: 10px;"><center>
                      <a href="http://'. $_SERVER['HTTP_HOST'] .'/VIEWS/LogOn/EDIT/user.php?id='. $MainUser->identifiant .'" style="text-decoration: none;">
                       <img src="http://'. $_SERVER['HTTP_HOST'] .'/VIEWS/Icon/Edit24.png" />
                      </a>

                     
                    <img class="trash" onclick="UserDelete(' . $MainUser->identifiant . ', \'' . config::GetBaseURL() . '\')" src="http://'. $_SERVER['HTTP_HOST'] .'/VIEWS/Icon/Delete24.png" />
                  </center></td>';
                    
                  echo '<tr>';
                }     
          ?>
      </table>
    </center>
    </div>
  </body>
</html>
   

    <?php

    //echo $Debug;

    ?>