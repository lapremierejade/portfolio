<!DOCTYPE html>
<html lang="fr">
<?php require_once('src/php/config.php');
$recupCreaTitle = explode('/', $_SERVER['REQUEST_URI']);
$creaTitle = $recupCreaTitle[2];
$prepare = $db->prepare('SELECT * FROM creations WHERE title = ?');
$prepare->execute(array($creaTitle));
$creation = $prepare->fetch();
$tabNumImg = explode(",", $creation['imgs']);
$numImg = array_slice($tabNumImg, 0, 1);
$imageSelect = $db->prepare('SELECT * FROM images WHERE id = ?');
$imageSelect->execute($numImg);
$image = $imageSelect->fetch();
$tabNumUser = explode(",", $creation['users']);
$tabNumVideos = explode(",", $creation['videos']);
$tabTitle = explode('-', $creation['title']);
?>

<head>
  <?php include("src/includes/head.html"); ?>
  <title><?php echo $creation['title'] ?> • neon prod.uction</title>
</head>

<body>
  <?php include("src/includes/header.html") ?>
  <a href="/" id="go-home"><img src="/src/img/arrow.svg">Retourner à l'accueil</a>
  <section id="presentation">
    <div class="card"><img src="<?php echo $image['link'] ?>" alt=""></div>
    <div>
      <div id="presentation-title">
        <h1><?php foreach ($tabTitle as $title) {
              echo '' . $title . ' ';
            } ?></h1>
        <h2><?php echo $creation['type'] . " • " . $creation['tool'] ?></h2>
      </div>
      <p><?php echo $creation['text'] ?></p>
    </div>
    <div>
      <?php foreach ($tabNumUser as $numUser) {
        $userSelect = $db->prepare('SELECT * FROM users WHERE id = ?');
        $userSelect->execute(array($numUser));
        $user = $userSelect->fetch();
        echo '<a href="' . $user['link'] . '" target="_blank"><img src="' . $user['img'] . '">' . $user['name'] . '</a>';
      } ?>
    </div>
  </section>
  <section id="galery">
    <h3>Galerie</h3>
    <div class="galery">
      <?php foreach ($tabNumVideos as $numVideo) {
        if ($numVideo != 0) {
          $videoSelect = $db->prepare('SELECT * FROM videos WHERE id = ?');
          $videoSelect->execute(array($numVideo));
          $video = $videoSelect->fetch();
          echo '<div class="card"><video src="' . $video['link'] . '" autoplay loop muted></video></div>';
        } else {
          echo '';
        }
      }
      foreach ($tabNumImg as $numImg) {
        $imageSelect->execute(array($numImg));
        $image = $imageSelect->fetch();
        echo '<div class="card"><img src="' . $image['link'] . '"></div>';
      } ?>
    </div>
  </section>
  <section id="prev-next">
    <?php
    $prepare = $db->query('SELECT id FROM creations');
    $tabCreaId = $prepare->fetchAll();
    $minId = array_shift($tabCreaId);
    $maxId = array_pop($tabCreaId);
    $prepare = $db->prepare('SELECT * FROM creations WHERE id = ?');
    if ($creation['id'] > $minId[0]) {
      $prepare->execute(array($creation['id'] - 1));
      $creaPrev = $prepare->fetch();
      $tabNumImg = explode(",", $creaPrev['imgs']);
      $numImg = array_slice($tabNumImg, 0, 1);
      $imageSelect->execute($numImg);
      $image = $imageSelect->fetch();
      echo '<a href="/creations/' . $creaPrev['title'] . '">
      <img src="/src/img/prev-next-arrow.svg">
      <div class="card"><img src="' . $image['link'] . '"></div>
      <div id="prev-next-title">
        <h4>Précédent</h4>
        <h5>' . $creaPrev['title'] . '</h5>
      </div>
    </a>';
    }
    if ($creation['id'] < $maxId[0]) {
      $prepare->execute(array($creation['id'] + 1));
      $creaNext = $prepare->fetch();
      $tabNumImg = explode(",", $creaNext['imgs']);
      $numImg = array_slice($tabNumImg, 0, 1);
      $imageSelect->execute($numImg);
      $image = $imageSelect->fetch();
      echo '<a href="/creations/' . $creaNext['title'] . '" id="prev-inverse">
      <img id="svg" src="/src/img/prev-next-arrow.svg">
      <div class="card"><img src="' . $image['link'] . '"></div>
      <div id="prev-next-title">
        <h4>Suivant</h4>
        <h5>' . $creaNext['title'] . '</h5>
      </div>
    </a>';
    } else echo '';
    ?>
  </section>
  <?php include_once('src/includes/footer.html') ?>
  <script src="/src/js/burger-menu.js"></script>
</body>

</html>