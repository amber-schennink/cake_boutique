<?php 
  if ($_POST['first-name'] || !$_POST['naam'] || !$_POST['email'] || !$_POST['bericht']) {
    header("Location: /");
  }else{
    $name = $_POST['naam'];
    $subject = 'Cake Boutique contact formulier';
    $email = $_POST['email'];
    $message = $_POST['bericht'];

    $mailHeader = "From: ".$name." <".$email.">\r\n";

    $recipient = "mail@mail.mail";

    mail($recipient, $subject, $message, $mailHeader)
    or die('Error!');

    header('Location: thankYou');
    exit();
  }
?>