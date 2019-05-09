<?php
require $_SERVER["DOCUMENT_ROOT"] . '../Models/utils/form.php';

function DisplayAnnonce(){

    $bdd = NewDB();

$query = "SELECT Date, Titre, Sous_titre, Description,Identifiant, Identifiant_Annonce_Type FROM annonces";

  $items = $bdd->query($query);

  foreach ($items as $item) {
          echo '   <div class="row">
                  <div class="HeaderAnnonce col-md-6">
                    <h3>' . $item['Titre'] . '</h3>
                    <h6>' . $item['Sous_titre'] . '</h6>
                  </div>
                  <div class=" dateView col-md-6">
                    <span class="date">' . $item['Date'] . '</span>
                  </div>
                </div>
                <div class="AnnonceContent">' .
                  $item['Description'] . '
                </div>';
          if($item['Identifiant_Annonce_Type'] == 1){
               echo '<div class="SubmitAnnonce">
                <a style="text-decoration:none; "class="button button3"href="UserForm-Controller.php?' . 'Id=' . $item['Identifiant'] .  '&Date=' . $item['Date'] .  '&IdType=' . $item['Identifiant_Annonce_Type'] .  '&Titre=' . $item['Titre'] .  '&subtitle=' . $item['Sous_titre'] . '">Souscrire un formulaire</a>
                </div>
                <hr class="StartBorder">';
          }
          else if($item['Identifiant_Annonce_Type'] == 3){
            echo '<div class="SubmitAnnonce">
             <a style="text-decoration:none; "class="button button3"href="CompanyForm-Controller.php?' . 'Id=' . $item['Identifiant'] .  '&Date=' . $item['Date'] .  '&IdType=' . $item['Identifiant_Annonce_Type'] .  '&Titre=' . $item['Titre'] .  '&subtitle=' . $item['Sous_titre'] . '">Souscrire un formulaire</a>
             </div>
             <hr class="StartBorder">';
          }

      }
}
