<?php
class Database {
  private $host = 'sql10.freemysqlhosting.net';
  private $user = 'sql10527870';
  private $pwd = 'eGdDmcRndB';
  private $dbName = 'sql10527870';

  protected function connect(){
    $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
    $pdo = new PDO('mysql:host='.$host.';dbname='.$dbName.,$user,$pwd);
    return $pdo;
  }
}
?>
