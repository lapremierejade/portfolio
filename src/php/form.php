<?php

if (isset($_POST['name']) && isset($_POST['firstname']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['motif']) && isset($_POST['message']) && !empty($_POST['name']) && !empty($_POST['firstname']) && !empty($_POST['email']) && !empty($_POST['subject']) && !empty($_POST['motif']) && !empty($_POST['message'])) {

  header('Location:../../?send=true#contact');

  $name = htmlspecialchars($_POST['name']);
  $firstname = htmlspecialchars($_POST['firstname']);
  $email = htmlspecialchars($_POST['email']);
  $subject = htmlspecialchars($_POST['subject']);
  $message = htmlspecialchars($_POST['message']);

  switch (htmlspecialchars($_POST['motif'])) {
    case '':
      $motif = "Aucun motif";
      break;
    case 'order':
      $motif = "Prestations";
      break;
    case 'infos':
      $motif = "Informations";
      break;
    case 'other':
      $motif = "Autre";
      break;
  }

  $to = 'hello@axelmarcial.com';
  $object = 'Nouveau message de ' . $firstname . ' ' . $name . '.';
  $content = "<html>
  <head>
      <title>[PORTFOLIO] - Nouveau message</title>
      <style type='text/css'>
          body{
              background-color: transparent;
              display: flex;
              flex-flow: column wrap;
              align-items: center;
          }
          p{
              color: dark-grey;
              text-align: center;
              font-size: 1.5em;
          }
      </style>
  </head>
  <body>
    <p>Message de : " . $firstname . " " . $name . ".</p>
    <p>Motif : " . $motif . ".</p>
    <p>Objet du message : " . $subject . ".</p>
    <p>Message :</p>
    <p>" . $message . "</p>
  </body>
</html>";

  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  $headers .= "Reply-To: " . $email . "\r\n";

  mail($to, $object, $content, $headers);
  // echo $name;
  // echo $firstname;
  // echo $email;
  // echo $subject;
  // echo $motif;
  // echo $message;
} else header('Location:../../?send=false#contact');
