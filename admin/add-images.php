<?php

require_once '../src/php/config.php';

if (isset($_POST['submit-images'])) {

  $upload_dir = '../src/uploads/';

  $name = $_FILES['file-img']['full_path'];
  $tmp_name = $_FILES['file-img']['tmp_name'];

  $upload_path = $upload_dir . basename($name);

  if (!file_exists($upload_path)) {
    $insert = $db->prepare('INSERT INTO images(link) VALUES (:link)');
    $insert->execute(array('link' => $upload_path));

    move_uploaded_file($tmp_name, $upload_path);

    header('Location:index.php?addi=true#add-images');
  }
  header('Location:index.php?addi=exist#add-images');
}
header('Location:index.php?addi=form#add-images');
