<?php
session_start();

require_once 'classes/User.php';
require_once 'classes/DB.php';


$user = new User(DB::getDBConnection('mysql:dbname=dev;host=127.0.0.1'));
?>

<form id="login" method="POST" action="index.php">
  <input type="hidden" name="login" value="1"><!-- Must have a field other than the button for Mink -->
  <input type="submit" value="logg inn">
</form>

<form id="logout" method="POST" action="index.php">
  <input type="hidden" name="logout" value="1"><!-- Must have a field other than the button for Mink -->
  <input type="submit" value="logg ut">
</form>

<a href="./addUser.php">Legg til kontakt</a>

<?php
  if ($user->loggedIn()) {
    echo "<h1>Hemmelig</h1>";
  } else {
    echo "<p>Ikke logget inn</p>";
  }
 ?>
