<?php

//Definitions des variables valeurs vides
$name_error = $email_error = $phone_error = $url_error = "";
$name = $email = $phone = $message = $url = $success = "";

// Formulaire envoie POST method
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  if (empty($_POST["name"])){
    $name_error = "Nom vide.";
  } else{
    $name = test_input($_POST["name"]);
    //Verification nom lettre et espace
    if(!preg_match("/^[a-zA-Z]*$/",$name)){
      $name_error = "Doit contenir que des lettres et des espaces.";
    }
  }

  if (empty($_POST["email"])){
    $email_error = "Email vide.";
  } else {
    $email = test_input($_POST["email"]);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $email_error = "Format Email invalide.";
    }
  }

  if (empty($_POST["phone"])){
    $phone_error = "Telephone vide";
  } else {
    $email = test_input($_POST["phone"]);
    if (!preg_match("/^(\d[s-]?)?[\(\[\s-]{0,2}?\d{3}[\s-]?\d{4}$\i",$phone)){
      $phone_error = "Telephone invalide."
    }
  }

  if (empty($_POST["url"])){
    $url_error = "";
  } else {
    $url = test_input($_POST["url"]);
    if (!preg_match("@((https?://)?([-\\w]+\\.[-\\w\\.]+)+\\w(:\\d+)?(/([-\\w/_\\.]*(\\?\\S+)?)?)*)@",$url)){
      $url_error = "Url invalide."
    }
  }

  if (empty($_POST["message"])){
    $message = "";
  } else {
    $message = test_input($_POST["message"]);
  }

  if($name_error == '' and $email_error == '' and $phone_error == '' and $url_error == ''){
    $message_body = '';
    unset($_POST['submit']);
    foreach ($_POST as $key => $value){
      $message_body .= "$key: $value\n";
    }

    $to = 'ivane_rodrigues@hotmail.com';
    $subject = 'Formulaire Contact';
    if(mail($to, $subject, $message)){
      $success = "Message envoye, merci de nous avoir contacte !";
      $name = $email = $phone = $message = $url = '';
    }

  }

}

function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
 ?>
