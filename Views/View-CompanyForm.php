<!DOCTYPE html>
<?php require $_SERVER["DOCUMENT_ROOT"] . '../Models/Company/form.php'; ?>
<html>
  <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
      <div class="container">
          <h1>Formulaire Société</h1>
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
              <label for="LastName">Nom de la société<span class="stars">*</span> :</label>
              <input type="text" name="LastName" class="form-control" id="LastName"  placeholder="Nom" value="<?php restoreText('LastName')?>">
            </div>
            <div class="form-group textFormContact">
              <label for="Desc">Description <span class="stars">*</span> : </label>
              <textarea class="form-control" id="Desc" name="Description"rows="3"><?php restoreText('Description')?></textarea>
            </div>
            <div class="rowForm">
              <label for="Phone">Téléphone <span class="stars">*</span> :</label>
              <input type="text" name="Phone" class="form-control" id="Phone"  placeholder="téléphone" value="<?php restoreText('Phone')?>">
            </div>
            <div class="rowForm">
              <label for="Email">Email <span class="stars">*</span> :</label>
              <input type="email" name="Email" class="form-control" id="Email"  placeholder="Email" value="<?php restoreText('Email')?>">
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
              <label for="Adress">Adresse <span class="stars">*</span> :</label>
              <input type="text" name="Adress" class="form-control" id="Adress"  placeholder="Adresse" value="<?php restoreText('Adress')?>">
            </div>
            <img class="imageForm2" src="Sources/logo.png" alt="">
          </div>
          </div>
      </div>

    </body>
</html>
