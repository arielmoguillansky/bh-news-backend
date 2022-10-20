<?php
 class ArticleController extends Database
 {
    public function getArticles() {
      $sql = "SELECT * FROM articles";
      $stmt = $this->connect()->query($sql);
      $data = [];
      while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        $data[]=$row;
      }
      return $data;
    }
 }
?>