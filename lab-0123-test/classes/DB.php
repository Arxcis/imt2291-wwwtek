<?php

class DB {
  private static $db=null;
  private $dsn='';
  private $user = 'root';
  private $password = '';
  private $dbh = null;

  private function __construct($_dsn) {
    $this->dsn = $_dsn;
    try {
        $this->dbh = new PDO($this->dsn, $this->user, $this->password);
    } catch (PDOException $e) {
        // NOTE IKKE BRUK DETTE I PRODUKSJON
        echo 'Connection failed: ' . $e->getMessage();
    }
  }

  public static function getDBConnection($_dsn) {
      
      if (DB::$db==null) {
        DB::$db = new self($_dsn);
      }
      return DB::$db->dbh;
  }
}
