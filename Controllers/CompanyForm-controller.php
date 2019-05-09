<?php

require $_SERVER["DOCUMENT_ROOT"] . '/../Views/Menu/View-Menu.php';
require $_SERVER["DOCUMENT_ROOT"] . '../Views/View-CompanyForm.php';
var_dump($_POST);
$Libelle = post('LastName');
$Phone = post('Phone');
$Adress = post('Adress');
$Email = post('Email');
$Description = post('Description');
$Message = post('Message');
$Date = date("Y-m-d");
$Annonce_Id = $_GET['Id'];

$ip = getIp();

$ipString = str_replace('.', '_', $ip);
$ipString;



if(!empty(post('Send'))){
   
    
    if($_FILES['Lettre'] != ''){
        mkdir($destinationLettre, 0777);
    }
    move_uploaded_file($tmp_nameCV, "$destinationCV/$nameCV");

    $tmp_nameLettre = $_FILES["Lettre"]["tmp_name"];
    $nameLettre = basename($_FILES["Lettre"]["name"]);
    $destinationLettre = $_SERVER["DOCUMENT_ROOT"] . "uploads/Users/Lettres/";

    move_uploaded_file($tmp_nameLettre, "$destinationLettre/$nameLettre");
    
    //Insert le particulier
    $bdd = NewDB();
    $insert = $bdd->prepare("INSERT INTO particulier(Nom, Prenom, Adresse, Telephone, Lettre, CV, Date_de_naissance, Email, Ip) VALUES('$LastName', '$FirstName', '$Adress', '$Phone', '$tmp_nameLettre', '$tmp_nameCV', '$Birthdate', '$Email' , '$Ip')");
    $insert->execute();
    
    //SELECT l'id du particulier créer avec l'INSERT précédent 
  
    $query = ("SELECT Identifiant FROM particulier ORDER BY Identifiant DESC LIMIT 1;");
    $result = $bdd->query($query);
    
    //Informations concernant l'annonce et le particulier qui y répond 
    foreach($result as $item){
        $itemId = $item['Identifiant'];
        $Message = $bdd->prepare("INSERT INTO annonce_particulier(Date_Candidature, Message, Identifiant_Annonces, Identifiant_Particulier) VALUES('$Date', '$Message' ,$Annonce_Id, $itemId)");
        var_dump($Message->execute());
        
    }
}





require $_SERVER["DOCUMENT_ROOT"] . '../Views/Menu/View-Footer.php';

