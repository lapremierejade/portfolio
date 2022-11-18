<?php

require_once '../src/php/config.php';

if (isset($_POST['submit-del-videos'])) {

  $id = $_POST['video-id'];

  $prepare = $db->prepare('SELECT * FROM videos WHERE id = ?');
  $prepare->execute(array($id));
  $video = $prepare->fetch();
  $row = $prepare->rowCount();

  if ($row > 0) {
    $delete = $db->prepare('DELETE FROM videos WHERE id = ?');
    $delete->execute(array($id));

    unlink($video['link']);

    header('Location:index.php?delv=true#all-images');
  } else header('Location:index.php?delv=dont-exist#all-images');
} else header('Location:index.php?delv=form#all-images');
