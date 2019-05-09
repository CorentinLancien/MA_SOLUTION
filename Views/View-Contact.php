<!DOCTYPE html>
<?php require $_SERVER["DOCUMENT_ROOT"] . '../Models/Subscription/form.php'; ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class=" col-md-7">
                  <h2>Contactez-nous :</h2>
                  <hr>
                  <?php
                  $errors = subscriptionIsValid();
                  if(!empty(post('Send'))){
                    foreach ($errors as $error) {
                        echo $error;
                    }
                  }

                  ?>
                  <form class="formContact" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="EMail">Adresse mail <span class="stars">*</span> : </label>
                      <input type="email" class="form-control" name="EMail" id="EMail" aria-describedby="emailHelp" placeholder="nom@exemple.com" value="<?php restoreText('EMail')?>">
                      <small id="emailHelp" class="form-text">Nous ne partagerons jamais votre adresse mail.</small>
                    </div>
                    <div class="formgroup  nameAndPhone">
                      <label for="Name">Nom Complet<span class="stars">*</span> :</label>
                      <input type="text" name="FirstName" placeholder="nom prénom" class="form-control" id="Name" value="<?php restoreText('FirstName')?>">
                    </div>
                    <div class="formgroup  nameAndPhone">
                      <label for="Phone">Téléphone<span class="stars"> * </span>  : </label>
                      <input type="text" name="Phone" placeholder="téléphone" class="form-control" id="Phone" value="<?php restoreText('Phone')?>">
                    </div>
                    <div class="form-group fileAndCompany">
                      <div class="rowForm">
                        <label for="Company">Société :</label>
                        <input type="text" name="Company" class="form-control Company" id="Company" placeholder="société" value="<?php restoreText('Company')?>">
                      </div>
                      <div class="rowForm">
                        <label class="file" for="File"><b>Pour toute demande de devis, veuillez joindre un plan :</b></label>
                        <input type="hidden" name="MAX_FILE_SIZE" value="25000000">
                        <input type="file" name="File" class="form-control-file" id="File" >
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="Title">Titre : </label>
                      <input type="text" name="Title" id="Title" class="form-control"  placeholder="Titre" value="<?php restoreText('Title')?>">
                    </div>
                    <div class="form-group textFormContact">
                      <label for="Text">Message <span class="stars">*</span> : </label>
                      <textarea class="form-control" id="Text" name="Message"rows="3"><?php restoreText('Message')?></textarea>
                    </div>
                    <input type="submit" value="Envoyer" name="Send" class="button button1 color"/>
                  </form>
                </div>
                <div class="col-md-4 Contact">
                  <h2 class="contactTitle">Contact</h2>
                  <div class="TextContact">
                    <div class="button button2">
                      <span>La Barre - 35850 ROMILLÉ</span>
                      <i class="fas fa-phone-square"></i>
                      <span>02 99 23 00 20</span>
                    </div>
                    <div class="mailContact centerFooter">
                      <a href="" style="padding-top: 0px;">contact@ma-solution-energetique.fr</a>
                    </div>
                    <p class="devis" ><b>Demandez-nous un devis, nous vous répondrons dans les plus brefs délais !</b></p>
                  </div>
                  <div class="peopleContact">
                    <div class="personContact">
                      <div class="label">Boris Anger</div>
                      <div class="button button1 phoneContact">
                        <div>
                          Électricité / Ventilation
                        </div>
                        <div>
                          06 25 23 69 03
                        </div>
                    </div>
                    <div class="personContact ">
                      <div class="label">Sébastien Maillard</div>
                      <div class="button button1 phoneContact">
                        <div>
                          Plomberie / Chauffage
                        </div>
                        <div>
                          06 37 03 65 82
                        </div>
                      </div>
                    </div>
                    <hr class="endBorder">
                  </div>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="end_of_page col-md-12">
            <h2>Nous localiser :</h2>
            <hr>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2664.3244917736606!2d-1.7300488843873816!3d48.10397577922079!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480efa9b33a79c21%3A0xdf794d3081cb2951!2sMa+Solution+Energetique!5e0!3m2!1sfr!2sfr!4v1556269837723!5m2!1sfr!2sfr"frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>
    </body>
</html>
