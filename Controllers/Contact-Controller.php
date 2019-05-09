<?php
require $_SERVER["DOCUMENT_ROOT"] . '/../Views/Menu/View-Menu.php';
require $_SERVER["DOCUMENT_ROOT"] . '../Views/View-Contact.php';


$errors = subscriptionIsValid();
$errorFind = 0;
$mail = 'corentinlancien35@gmail.com';


if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail))
{
	$passage_ligne = "\r\n";
}
else
{
	$passage_ligne = "\n";
}
if(!empty(post('Send'))){
		foreach ($errors as $error) {
    	if($error != ''){
        	$errorFind = 1;
    	}
		}

}
if(!empty(post('Send')) && $errorFind == 0){
$message_txt = post('Message');
$expediteur = post('EMail');
$nom = post('FirstName');
$sujet = post('Title');
$phone = post('Phone');
$company = post('Company');


$file_type = $_FILES["File"]["type"];
$file_size = $_FILES["File"]["size"];
$tmp_name = $_FILES["File"]["tmp_name"];
$name = basename($_FILES["File"]["name"]);
$destination = $_SERVER["DOCUMENT_ROOT"] . "uploads/Others/$name";

move_uploaded_file($tmp_name, "$destination");

ini_set('SMTP','smtp.free.fr');
ini_set($expediteur, $mail);

$boundary = "-----=".md5(rand());



$header = "From: \"$mail\"<$expediteur>".$passage_ligne;

$header.= "Reply-to: \"Ma Solution énergétique\" <$mail>".$passage_ligne;
$header.= "MIME-Version: 1.0".$passage_ligne;

$header.= "Content-Type: multipart/mixed ;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;

$message = $message = $passage_ligne."--".$boundary.$passage_ligne;
$message.= "Content-Type: text/plain; charset=\"UTF-8\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message .=$passage_ligne . "Mail envoyé par : " . $nom.$passage_ligne.$passage_ligne;
$message .= "Téléphone : " . $phone.$passage_ligne.$passage_ligne;
$message .= "Société : " . $company.$passage_ligne.$passage_ligne;
$message.= "Message : ".$passage_ligne . $message_txt.$passage_ligne;

$message .= "--".$boundary.$passage_ligne;
if(($_FILES['File']['tmp_name'] != '')){
$handle = fopen($destination, 'r') or die('File '.$destination.'can t be open');
$content = fread($handle, $file_size);
$content = chunk_split(base64_encode($content));
$f = fclose($handle);
$message.= "Content-Type: " . $file_type . "; name = '" . $destination . "'" .$passage_ligne;
$message.= "Content-Transfer-Encoding: base64".$passage_ligne;
$message.= "Content-Disposition: attachment; filename='" . $name ."'" .$passage_ligne;
$message.= $content .$passage_ligne;
}

mail($mail,$sujet,$message,$header);

}

require $_SERVER["DOCUMENT_ROOT"] . '../Views/Menu/View-Footer.php';
