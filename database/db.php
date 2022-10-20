<?php
  // production db connection
  // $host = 'sql10.freemysqlhosting.net';
  // $user = 'sql10527870';
  // $pwd = 'eGdDmcRndB';
  // $dbName = 'sql10527870';
  
  // local db connectcion
  $host = 'localhost';
  $user = 'root';
  $pwd = '';
  $dbName = 'bh_news';
  $connection = mysqli_connect($host, $user, $pwd, $dbName);
  if(!$connection) {
    die("DB connection failed");
  }
?>