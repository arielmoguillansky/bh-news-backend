<?php
  $connection = mysqli_connect('localhost', 'root', '', 'bh_news');
  if(!$connection) {
    die("DB connection failed");
  }
?>