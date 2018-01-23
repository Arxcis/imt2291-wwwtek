<?php
use PHPUnit\Framework\TestCase;

require_once './vendor/autoload.php';
require_once './classes/DB.php';

final class DBTest extends TestCase {
  public function testCanConnectToDB() {

    // assert testdatabase
    $this->assertInstanceOf(
      PDO::class,
      DB::getDBConnection('mysql:dbname=test;host=127.0.0.1')
    );

    // assert devdatabase
    $this->assertInstanceOf(
      PDO::class,
      DB::getDBConnection('mysql:dbname=dev;host=127.0.0.1')
    );
  }
}
