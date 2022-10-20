<?php
    include "./database/db.php";
    function getAllCategories () {
      return $query = "SELECT * FROM categories";
    }
    function getUserById ($id) {
      return $query = "SELECT * FROM users WHERE id = $id";
    }
    function getArticleById ($id) {
      return $query = "SELECT * FROM articles WHERE id = $id";
    }
    function isLoggedIn () {
      if(!isset($_SESSION['userEmail']) && !isset($_SESSION['userPassword'])) {
        header('Location: login.php');
      }
    }
    function hashPassword($password) {
      return password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
    }
?>