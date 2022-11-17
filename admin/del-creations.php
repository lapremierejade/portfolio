<?php

require_once '../src/php/config.php';

if (isset($_POST['submit-del-creations'])) {

  $id = $_POST['crea-id'];

  $prepare = $db->prepare('SELECT id FROM creations WHERE id = ?');
  $prepare->execute(array($id));
  $row = $prepare->rowCount();

  if ($row > 0) {
    $delete = $db->prepare('DELETE FROM creations WHERE id = ?');
    $delete->execute(array($id));
    header('Location:index.php?delc=true#all-creations');
  }
  header('Location:index.php?delc=dont-exist#all-creations');
}
header('Location:index.php?delc=form#all-creations');
