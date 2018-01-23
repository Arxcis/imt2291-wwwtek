<?php

use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;
use Behat\Mink\Element\DocumentElement;
use Behat\Mink\Element\NodeElement;

require_once './classes/DB.php';
require_once './classes/User.php';

final class UserTest extends TestCase {

  protected $pageURL = 'http://localhost/wwwlab/lab-0123-test/addUser.php';
  protected $session;
  protected $db; 
  
  protected function setup() {
    $driver = new \Behat\Mink\Driver\GoutteDriver();
    $this->session = new \Behat\Mink\Session($driver);
    $this->session->start();

    $this->db = DB::getDBConnection('mysql:dbname=test;host=127.0.0.1');
    
    $sql = <<<EOT
    CREATE TABLE `user` (
      `username` varchar(127) CHARACTER SET utf8 NOT NULL PRIMARY KEY,
      `password` varchar(127) CHARACTER SET utf8 NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
EOT;
    $this->db->exec($sql);
  }
/*
  protected function teardown() {
    $sql = 'DROP TABLE user';
    $this->db->exec($sql);
  }*/

  public function testCanCreateFromValidData() {

    $this->session->visit($this->pageURL);
    $page = $this->session->getPage();

    //print_r($page->getContent());

    // TEST 1 - find form
    $form = $page->find('css', '#addUser');
    $this->assertInstanceOf(NodeElement::Class, $form, 'Unable to locate form#addUser');

    // TEST 2 - find email 
    $input_email = $page->find('css', '#username');
    $this->assertInstanceOf(NodeElement::Class, $input_email, 'Unable to locate add label#username');

    // TEST 3 - find password
    $input_password = $page->find('css', '#password');
    $this->assertInstanceOf(NodeElement::Class, $input_password, 'Unable to locate add label#username');


    $input_email->setValue('jonas.solsvik@gmail.com');
    $input_password->setValue('foobar');

   // print_r($input_email->getValue() . $input_password->getValue());

    $form->submit();
  }
/*
  public function testCannotCreateFromInvalidData() {

  }

  public function testCannotCreateFromDubplicateUsername() {

  }*/
}

/*


    $form->submit();

    $page = $this->session->getPage();

    // Check that we are logged in
    $this->assertInstanceOf(
                           NodeElement::Class,
                           $page->find('css', 'h1'),
                           'Should have a h1 tag in this page'
                         );
    $this->assertEquals('Hemmelig', $page->find('css', 'h1')->getText(),
                        'The secret message is wrong');

    // Reload the page
    $this->session->visit($this->baseUrl);
    $page = $this->session->getPage();

    // Check that we are still logged in
    $this->assertInstanceOf(
                           NodeElement::Class,
                           $page->find('css', 'h1'),
                           'Logged out after reload'
                         );
    $this->assertEquals('Hemmelig', $page->find('css', 'h1')->getText(),
                        'The secret message is wrong after page reload');
  }*/