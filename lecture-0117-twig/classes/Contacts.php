<?php

class Contacts {

  public function __construct() {

  }

  public function __destruct() {

  }

  public function addContact() {

    $sql = '';
    $sth = $this->db->prepare($sql);

    $tmp = [];

    if ($sth->rowCount() == 1) {

      $tmp['status'] = 'OK';
      $tmp['id'] = $this->db->lastInsertId();
    
    } else {
      $tmp['status'] = 'FAIL';
      $tmp['errorMessage'] = 'FAiled to insert';
      $tmp['errorInfo'] = $sth->errorInfo();
    }

    return $tmp;
  }
}