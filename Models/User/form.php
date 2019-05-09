<?php
require $_SERVER["DOCUMENT_ROOT"] . '../Models/utils/form.php';
function userFormIsValid(){
    $errors = [];

if(!empty(post('Send'))){
    if(post('Email') == ""){
         $errors[] = '<div class="echos"><div class="errors fas fa-exclamation-triangle"></div><div class="errors">Veuillez renseigner votre adresse mail</div></div>';
     }
     if(post('FirstName') == ""){
          $errors[] = '<div class="echos"><div class=" errors fas fa-exclamation-triangle"></div><div class=" errors">Veuillez renseigner votre prénom</div></div>';
     }
      if(post('LastName') == ""){
          $errors[] = '<div class="echos"><div class=" errors fas fa-exclamation-triangle"></div><div class=" errors">Veuillez renseigner votre nom</div></div>';
     }
    if(post('Phone') == ""){
         $errors[] = '<div class="echos"><div class="errors fas fa-exclamation-triangle"></div><div class=" errors">Veuillez renseigner votre numéro de téléphone</div></div>';
    }
    if(post('Adress') == ""){
        $errors[] = '<div class="echos"><div class=" errors fas fa-exclamation-triangle"></div><div class=" errors">Veuillez renseignez votre adresse</div></div>';
    }
    $extensions = array('.pdf');
    $extension = strrchr($_FILES['CV']['name'], '.');
    if(!in_array($extension, $extensions))
    {
        $errors[] = '<div class="echos"><div class=" errors fas fa-exclamation-triangle"></div><div class=" errors">Vous devez ajouter un fichier de type pdf</div></div>';
    }
    $taille_maxi = 25000000;
    $taille = filesize($_FILES['CV']['tmp_name']);
    if($taille>$taille_maxi)
    {
        $errors[] = '<div class="echos"><div class=" errors fas fa-exclamation-triangle"></div><div class=" errors">Le fichier est trop gros . . . </div></div>';
    }
    if ($_FILES['CV']['error'] > 0 && ($_FILES['CV']['tmp_name'] != '')){
        $errors[] = '<div class="echos"><div class=" errors fas fa-exclamation-triangle"></div><div class=" errors">Erreur lors du transfert du fichier</div></div>';
    }
    return $errors;
}
}

