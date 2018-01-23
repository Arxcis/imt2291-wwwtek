<?php
class User {
  private $uid = -1;
  private $db = null;

  public function __construct($_db) {
    
    if (isset($_POST['login'])) {
      $this->uid = 1;
      $_SESSION['uid'] = 1;
    } else if (isset($_POST['logout'])) {
      unset($_SESSION['uid']);
    } else if (isset($_SESSION['uid'])) {
      $this->uid = 1;
    }
    $this->db = $_db;
  }

  public function loggedIn() {
    return $this->uid==1;
  }

/* @oppgave
  Legg til metode addUser i denne klassen, metoden skal ta i mot brukernavn og passord og annen brukerrelatert informasjon. Bruk e-post som brukernavn, annen informasjon som kan være aktuelt å lagre er navn (fornavn/etternavn), kallenavn, avatarbilde, hjemmeside etc. Returner som minimum status=ok og id=ny brukerid ved suksess og status=fail og errorMessage=hensiktsmessig feilbeskjed ved feil. Bruk DB.php klassen fra denne ukens forelesningsnotater for å sende med databaseforbindelse til konstruktoren for klassen.
  Bruk password_hash for hashing av passord.
*/

  public function addUser($data)  {

    $sql = 'insert into user (username, password) VALUES (?, ?)';

    $sth = $this->db->prepare ($sql);
    $sth->execute(array($data['username'], 
                        password_hash($data['password'], PASSWORD_DEFAULT)));
                       /* $data['firstname'],
                        $data['lastname'],
                        $data['nickname'],
                        $data['URLavatarimage'],
                        $data['URLhomepageurl']*/

  // If the row was successfully added.
    $res = [];
    if ($sth->rowCount()==1) { 
      $res['status'] = 'OK';
      $res['id'] = $this->db->lastInsertId();
    } else {
      $res['status'] = 'FAIL';
      $res['errormsg'] = 'Failed to add User';
      $res['errorinfo'] = $sth->errorInfo();
    }
    return $res;
  }
}
