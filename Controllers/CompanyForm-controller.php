<?php

require $_SERVER["DOCUMENT_ROOT"] . '/../Views/Menu/View-Menu.php';
require $_SERVER["DOCUMENT_ROOT"] . '../Views/View-CompanyForm.php';

$_POST;
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

$errors = companyFormIsValid();
$errorFind = 0;

if(!empty(post('Send'))){
		foreach ($errors as $error) {
    	if($error != ''){
        	$errorFind = 1;
    	}
		}
}

if(!empty(post('Send')) && $errorFind == 0){


    //Insert la société
    $bdd = NewDB();
    $insert = $bdd->prepare("INSERT INTO societe(Libelle, Email,  Adresse, Telephone, Description) VALUES('$Libelle', '$Email', '$Adress', '$Phone', '$Description')");
    $insert->execute();

    //SELECT l'id de la société créer avec l'INSERT précédent

    $query = ("SELECT Identifiant FROM societe ORDER BY Identifiant DESC LIMIT 1;");
    $result = $bdd->query($query);

    //Informations concernant l'annonce et la société qui y répond
    foreach($result as $item){
        $itemId = $item['Identifiant'];
        $Message = $bdd->prepare("INSERT INTO annonce_societe(Date_de_demande, Message, Identifiant_Annonces, Identifiant_Societe) VALUES('$Date', '$Message' ,$Annonce_Id, $itemId)");
        $Message->execute();

    }
}





require $_SERVER["DOCUMENT_ROOT"] . '../Views/Menu/View-Footer.php';
