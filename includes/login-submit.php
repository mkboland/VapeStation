<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL); //error reporting

include 'includes/config.php'; //connects to database
session_start(); //used for login session

$error = ''; // define variable

if($_SERVER["REQUEST_METHOD"] == "POST") {
  // username and password sent from form

  $myusername = mysqli_real_escape_string($db,$_POST['username']); //strips slashes from the form
  $inputpassword = mysqli_real_escape_string($db,$_POST['password']); //strips slashes from the form

  $sql = "SELECT * FROM users WHERE email = '$myusername'"; //build the sql query
  $result = mysqli_query($db,$sql); //sends the query

  if (mysqli_num_rows($result) > 0) { //checks for multiple rows
    while($row = mysqli_fetch_assoc($result)){ //foreach row fetch the results
      $dbPassword = "$row[password]"; //stores the password as a variable
      if(password_verify($inputpassword,$dbPassword)) { //if the inputed password matches the hash
        $_SESSION['login_user'] = $myusername; //stores session user name
        header("location: admin-dashboard.php"); //redirects to main webpage
      } else {
        $error = "Password is incorrect";
      }
    }
  }
  else {
    $error = "Email does not exist";
  }
}

?>
