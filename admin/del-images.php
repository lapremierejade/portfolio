<?php

require_once '../src/php/config.php';

if (isset($_POST['submit-del-images'])) {

  $id = $_POST['img-id'];

  $prepare = $db->prepare('SELECT id FROM images WHERE id = ?');
  $prepare->execute(array($id));
  $row = $prepare->rowCount();

  if ($row > 0) {
    $delete = $db->prepare('DELETE FROM images WHERE id = ?');
    $delete->execute(array($id));
    header('Location:index.php?send=deli#all-images');
  } header('Location:index.php?deli=dont-exist#all-images');
} header('Location:index.php?deli=form#all-images');
