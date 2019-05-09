<?php
require $_SERVER["DOCUMENT_ROOT"] . '../Models/utils/form.php';
function subscriptionIsValid(){
    $errors = [];

if(!empty(post('Send'))){
    if(post('EMail') == ""){
         $errors[] = '<div class="echos"><div class="errors fas fa-exclamation-triangle"></div><div class="errors">Veuillez renseigner votre adresse mail</div></div>';
     }
     if(post('FirstName') == ""){
          $errors[] = '<div class="echos"><div class=" errors fas fa-exclamation-triangle"></div><div class=" errors">Veuillez renseigner votre nom</div></div>';
     }
    if(post('Phone') == ""){
         $errors[] = '<div class="echos"><div class="errors fas fa-exclamation-triangle"></div><div class=" errors">Veuillez renseigner votre numéro de téléphone</div></div>';
    }
    if(post('Message') == ""){
        $errors[] = '<div class="echos"><div class=" errors fas fa-exclamation-triangle"></div><div class=" errors">Veuillez nous adresser un message</div></div>';
    }
    $extensions = array('.png', '.gif', '.jpg', '.jpeg', '.txt', '.pdf');
    $extension = strrchr($_FILES['File']['name'], '.');
    if(!in_array($extension, $extensions) && ($_FILES['File']['tmp_name'] != ''))
    {
        $errors[] = '<div class="echos"><div class=" errors fas fa-exclamation-triangle"></div><div class=" errors">Vous devez ajouter un fichier de type png, gif, jpg, jpeg, txt, ou pdf</div></div>';
    }
    $taille_maxi = 25000000;
    $taille = filesize($_FILES['File']['tmp_name']);
    if($taille>$taille_maxi)
    {
        $errors[] = '<div class="echos"><div class=" errors fas fa-exclamation-triangle"></div><div class=" errors">Le fichier est trop gros . . . </div></div>';
    }
    if ($_FILES['File']['error'] > 0 && ($_FILES['File']['tmp_name'] != '')){
        $errors[] = '<div class="echos"><div class=" errors fas fa-exclamation-triangle"></div><div class=" errors">Erreur lors du transfert du fichier</div></div>';
    }
    return $errors;
}
}
