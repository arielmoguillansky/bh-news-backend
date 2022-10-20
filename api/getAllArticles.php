<?php
  include "../database/db.php";
  include "../coolFunctions.php";
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: access");
  header("Access-Control-Allow-Methods: GET,POST");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  header("Content-type: application/json; charset=UTF-8");

  $query = "SELECT * FROM articles";
  $result = mysqli_query($connection, $query);
  $data = [];
  while($row=mysqli_fetch_assoc($result)){
    $data[]=$row;
  }
  echo json_encode($data);

?>