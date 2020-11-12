<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); //error reporting

include 'session.php';

if (isset($_POST['submit'])) {

  $firstName = strip_tags($_POST['firstName']);
  $lastName = strip_tags($_POST['lastName']);
  $email = strip_tags($_POST['email']);
  $phone = strip_tags($_POST['phone']);
  $message = strip_tags($_POST['message']);

  $to = "michael@michaelboland.co.uk";
  $subject = "Vape Station Enquiry";

  $msg = "
  Thank you for contacting us.\n
  We have recevied the following information:\n
  First Name: $firstName\n
  Last Name: $lastName\n
  Email: $email\n
  Telephone: $phone\n
  Message: $message
  ";

  $headers = "From: info@vapestation.co.uk\r\nReply-To: info@vapestation.co.uk";

  mail($to,$subject,$msg,$headers);

  header("location: ../contact-us.php");
  $_SESSION['sent'] = 'Message successfully sent';

} else {
  $_SESSION['error'] = 'Unexpect Error. Please try again';
}

 ?>
