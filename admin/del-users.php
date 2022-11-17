<?php

require_once '../src/php/config.php';

if (isset($_POST['submit-del-users'])) {

  $id = $_POST['user-id'];

  $prepare = $db->prepare('SELECT id FROM users WHERE id = ?');
  $prepare->execute(array($id));
  $row = $prepare->rowCount();

  if ($row > 0) {
    $delete = $db->prepare('DELETE FROM users WHERE id = ?');
    $delete->execute(array($id));
    header('Location:index.php?send=delu#all-users');
  } header('Location:index.php?delu=dont-exist#all-users');
} header('Location:index.php?delu=form#all-users');