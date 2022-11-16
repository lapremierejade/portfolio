<?php

// add images
if (isset($_POST['submit'])) {

  $target_dir = '/src/img/';
  $target_file = $target_dir . basename($_FILES['img-file']['name']);
  $uploadOK = 1;
  $check = getimagesize($_FILES['img-file']['tmp_name']);
  if ($check !== false) {
    $uploadOK = 1;
  } else {
    $uploadOK = 0;
  }

  if (file_exists($target_file)) {
    $uploadOK = 0;
  }

  if ($uploadOK == 0) {
    header('Location:index.php?file=not-upload');
  } else {
    if (move_uploaded_file($_FILES['img-file']['tmp_name'], $target_file)) {
      header('Location:index.php?file=upload');
    } else {
      header('Location:index.php?file=not-upload');
    }
  }
} else header('Location:index.php?file=form');
