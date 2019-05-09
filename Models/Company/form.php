<?php
require $_SERVER["DOCUMENT_ROOT"] . '../Models/utils/form.php';
function userFormIsValid(){
    $errors = [];

if(!empty(post('Send'))){
    if(post('Email') == ""){
         $errors[] = '<div class="echos"><div class="errors fas fa-exclamation-triangle"></div><div class="errors">Veuillez renseigner votre adresse mail</div></div>';
     }

    if(post('LastName') == ""){
          $errors[] = '<div class="echos"><div class=" errors fas fa-exclamation-triangle"></div><div class=" errors">Veuillez renseigner le nom de votre société</div></div>';
     }
    if(post('Phone') == ""){
         $errors[] = '<div class="echos"><div class="errors fas fa-exclamation-triangle"></div><div class=" errors">Veuillez renseigner votre numéro de téléphone</div></div>';
    }
    if(post('Adress') == ""){
        $errors[] = '<div class="echos"><div class=" errors fas fa-exclamation-triangle"></div><div class=" errors">Veuillez renseignez votre adresse</div></div>';
    }
        if(post('Description') == ""){
        $errors[] = '<div class="echos"><div class=" errors fas fa-exclamation-triangle"></div><div class=" errors">Veuillez renseignez une description</div></div>';
    }
    return $errors;
}
}

