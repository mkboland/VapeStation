<?php
  date_default_timezone_set('Europe/London');
  setlocale(LC_ALL, array('en_GB.UTF8','en_GB','english'));

  $live = 'false';

  if ($live == 'true'){
    $host_name = 'db5001178334.hosting-data.io';
    $database = 'dbs1005924';
    $user_name = 'dbu1413779';
    $password = '79@XC5cD';

    $db = mysqli_connect($host_name, $user_name, $password, $database);
  } else{
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', 'root');
    define('DB_DATABASE', 'vapes');

    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  }
?>
