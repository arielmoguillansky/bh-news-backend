<?php
class Database {
  private $host = 'localhost';
  private $user = 'root';
  private $pwd = '';
  private $dbName = 'bh_news';

  protected function connect(){
    $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
    $pdo = new PDO('mysql:host=localhost;dbname=bh_news','root','');
    return $pdo;
  }
}
?>
