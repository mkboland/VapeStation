<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL); //error reporting

include 'session.php';

if (isset($_POST['submit'])) {

  $firstName = strip_tags($_POST['firstName']); //all data from form
  $lastName = strip_tags($_POST['lastName']);
  $email = strip_tags($_POST['email']);
  $phone = strip_tags($_POST['phone']);
  $message = strip_tags($_POST['message']);

  $to = $email; //who it to
  $subject = "Vape Station Enquiry"; //subject

  $msg = '
  <!doctype html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title>VapeStation Order Confirmation</title>
    </head>
    <body style="padding:0; margin: 0 5%; height: 100vh; position: relative; background-colour: white !important; color: black !important;">

      <div style="width: 100%; height: 200px; background: #1d1d1d;">
        <h1 style="margin: 0; padding: 75px; text-align: center; color: #cf7500">VapeStation</h1>
      </div>

      <div style="text-align: center">
        <h2 style="color: #cf7500">Thank you '.$name.'</h2>

        <p>We have received your message and aim to get back to you within 48 hours.</p>
        <p>Message: '.$message.'<p>
        <p>Best Regards</p>
        <p style="font-weight: bold; color: #cf7500;">VapeStation</p>
      </div>

      <div style="width: 100%; height: 200px; background: #1d1d1d; position: absolute; bottom: 0;">
        <h1 style="margin: 0; padding: 75px; text-align: center; color: #cf7500">VapeStation</h1>
      </div>

    </body>
  </html>
  '; //html message

  //array of headers
  $headers[] = 'MIME-Version: 1.0';
  $headers[] = 'Content-type: text/html; charset=iso-8859-1';
  $headers[] = 'From: Vape Station <info@vapestation.co.uk>';
  $headers[] = 'Reply-To: Vape Station <info@vapestation.co.uk>';
  $headers[] = 'Bcc: michael@michaelboland.co.uk';

  mail($to, $subject, $msg, implode("\r\n", $headers)); //sends email and implodes array of headers

  header("location: ../contact-us.php"); //redirect
  $_SESSION['sent'] = 'Message successfully sent'; //alert success

} else {
  $_SESSION['error'] = 'Unexpect Error. Please try again';
}

 ?>
