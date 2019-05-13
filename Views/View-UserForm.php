<!DOCTYPE html>
<?php require $_SERVER["DOCUMENT_ROOT"] . '../Models/User/form.php'; 

$ip = getIp();
$ipString = str_replace('.', '_', $ip);
$destinationCV = $_SERVER["DOCUMENT_ROOT"] . "uploads/Users/CV/$ipString";
if(is_dir($destinationCV)){
    header("location:Error-Controller.php");
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
      <div class="container">
          <h1>Formulaire Particulier</h1>

              <?php echo '   <div class="row">
                  <div class="HeaderAnnonce col-md-6">
                    <h3>' . $_GET['Titre'] . '</h3>
                    <h6>' . $_GET['subtitle'] . '</h6>
                  </div>
                  <div class=" dateView col-md-6">
                    <span class="date">' . $_GET['Date'] . '</span>
                  </div>
                  '?>
            </div>
                   <?php
                  $errors = userFormIsValid();
                  if(!empty(post('Send'))){
                    foreach ($errors as $error) {
                        echo $error;
                    }
                  }

                  ?>
          <form class="FormContact" action="" method="post" enctype="multipart/form-data" style="margin-bottom: 0px;">
            <div class="row">
              <div class="col-md-6">
            <div class="rowForm">
              <label for="LastName">Nom <span class="stars">*</span> :</label>
              <input type="text" name="LastName" class="form-control" id="LastName"  placeholder="Nom" value="<?php restoreText('LastName')?>">
            </div>

            <div class="rowForm">
              <label for="Phone">Téléphone <span class="stars">*</span> :</label>
              <input type="text" name="Phone" class="form-control" id="Phone"  placeholder="téléphone" value="<?php restoreText('Phone')?>">
            </div>
            <div class="rowForm">
              <label for="Email">Email <span class="stars">*</span> :</label>
              <input type="email" name="Email" class="form-control" id="Email"  placeholder="Email" value="<?php restoreText('Email')?>">
            </div>

            <div class="rowForm">
              <label for="Birthdate">Date de naissance :</label>
              <input type="date" name="Birthdate" class="form-control" id="Birthdate"   value="<?php restoreText('Birthdate')?>">
            </div>
            <div class="rowForm">
              <label class="file" for="CV"><b>Veuillez joindre un CV (Format : pdf) <span class="stars">*</span> : </b></label>
              <input type="hidden" name="MAX_FILE_SIZE" value="25000000">
              <input type="file" name="CV" class="form-control-file" id="CV" >
            </div>
            <div class="rowForm">
              <label class="file" for="Lettre"><b>Vous pouvez joindre une lettre de motivation :</b></label>
              <input type="hidden" name="MAX_FILE_SIZE" value="25000000">
              <input type="file" name="Lettre" class="form-control-file" id="Lettre" >
            </div>
            <div class="form-group textFormContact">
              <label for="Text">Message  : </label>
              <textarea class="form-control" id="Text" name="Message"rows="3"><?php restoreText('Message')?></textarea>
            </div>
              <input type="submit" value="Envoyer" name="Send" class="buttonForm button button1 color"/>
          </form>
          </div>
          <div class="col-md-6">
            <div class="rowForm">
              <label for="FirstName">Prénom <span class="stars">*</span> :</label>
              <input type="text" name="FirstName" class="form-control" id="FirstName"  placeholder="Prénom"  value="<?php restoreText('FirstName')?>">
            </div>
            <div class="rowForm">
              <label for="Adress">Adresse <span class="stars">*</span> :</label>
              <input type="text" name="Adress" class="form-control" id="Adress"  placeholder="Adresse" value="<?php restoreText('Adress')?>">
            </div>
            <img class="imageForm" src="Sources/logo.png" alt="">
          </div>
          </div>
      </div>

    </body>
</html>
