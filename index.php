<!DOCTYPE html>
<html lang="fr" >
<head>
  <meta charset="UTF-8">
  <title>F5100.1</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <?php include('form_process.php'); ?>
<div class="container">
  <form id="contact" action="<?=$_SERVER['PHP_SELF'];?>" method="post">
    <h3>Formulaire de contact</h3>
    <br/>
    <fieldset>
      <input placeholder="Nom" type="text" tabindex="1" value="<?= $name ?>" autofocus>
      <span class="error"><?= $name_error ?></span>
    </fieldset>
    <fieldset>
      <input placeholder="Email" type="email" tabindex="2" value="<?= $email ?>">
      <span class="error"><?= $email_error ?></span>
    </fieldset>
    <fieldset>
      <input placeholder="Téléphone" type="tel" tabindex="3" value="<?= $phone ?>">
      <span class="error"><?= $phone_error ?></span>
    </fieldset>
    <fieldset>
      <input placeholder="URL" type="url" tabindex="4" value="<?= $url ?>">
      <span class="error"><?= $url_error ?></span>
    </fieldset>
    <fieldset>
      <textarea placeholder="Message" tabindex="5" value="<?= $message ?>"></textarea>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit">Envoyez</button>
    </fieldset>
    <div class ="success"><?= $success; ?></div>
  </form>
</div>
</body>
</html>
