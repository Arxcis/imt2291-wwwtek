
<?php


if (!isset($_POST['addContact'])) {
  echo $twig->render('addContactForm.html');
} else {
  $data['givenName']  = $_POST['givenName'];
  $data['familyName'] = $_POST['familyName'];
  $data['phone']      = $_POST['phone'];
  $data['email']      = $_POST['email'];

  $contacts = new Contacts();
  $res = $contacts->addContact($data);

  $res['data'] = $data;

}