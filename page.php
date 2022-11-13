<!DOCTYPE html>
<html lang="fr">

<head>
  <!-- META -->
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- LINK -->
  <link rel="stylesheet" href="src/css/style.css">
  <link rel="stylesheet" href="src/css/responsive.css">
  <!-- IMAGES -->
  <link rel="shortcut icon" href="src/img/favicon.ico" type="image/x-icon">
  <!-- TITLE -->
  <title>page • neon prod.uction</title>
</head>

<body>
  <?php include("src/includes/header.html") ?>
  <a href="index.php" id="go-home"><img src="src/img/arrow.svg">Retourner à l'accueil</a>
  <section id="presentation">
    <?php require_once('src/php/config.php');
    $creaId = $_GET['id'];
    $prepare = $db->prepare('SELECT * FROM creations WHERE id = ?');
    $prepare->execute(array($creaId));
    $creation = $prepare->fetch();
    // print_r($creation);
    $tabNumImg = explode(",", $creation['imgs']);
    // print_r($tabNumImg);
    $numImg = array_slice($tabNumImg, 0, 1);
    $imageSelected = $db->prepare('SELECT * FROM images WHERE id = ?');
    $imageSelected->execute($numImg);
    $image = $imageSelected->fetch();
    // print_r($image['link']);
    $tabNumUser = explode(",", $creation['users']);
    // print_r($tabNumUser);
    ?>
    <div class="card"><img src="<?php echo $image['link'] ?>" alt=""></div>
    <div>
      <div id="presentation-title">
        <h1><?php echo $creation['title'] ?></h1>
        <h2><?php echo $creation['type'] . " • " . $creation['tool'] ?></h2>
      </div>
      <p><?php echo $creation['text'] ?></p>
    </div>
    <div>
      <a href=""><img src="src/img/main-logo.png" alt="logo de neon production">Néon Prod.uction</a>
      <?php foreach ($tabNumUser as $numUser) {
        $userSelected = $db->prepare('SELECT * FROM users WHERE id = ?');
        $userSelected->execute(array($numUser));
        $user = $userSelected->fetch();
        // print_r($user);
        echo '<a href="' . $user['link'] . '" target="_blank"><img src="' . $user['img'] . '">' . $user['name'] . '</a>';
      } ?>
    </div>
  </section>
  <section id="galery">
    <h3>Galerie</h3>
    <div class="galery">
      <?php foreach($tabNumImg as $numImg){
        $imageSelected = $db->prepare('SELECT * FROM images WHERE id = ?');
        $imageSelected->execute(array($numImg));
        $image = $imageSelected->fetch();
        // print_r($image);
        echo '<div class="card"><img src="'.$image['link'].'"></div>';
      } ?>
    </div>
  </section>
  <section id="prev-next">
    <a href="">
      <img src="src/img/prev-next-arrow.svg">
      <div class="card"><img src="https://www.naturepaysage.photo/wp-content/uploads/Nature-Paysage-portfolio-17-novembre-2019-0017-3.jpg" alt=""></div>
      <div id="prev-next-title">
        <h4>Précédent</h4>
        <h5>Lorem ipsum dolor sit amet</h5>
      </div>
    </a>
    <a href="" id="prev-inverse">
      <img id="svg" src="src/img/prev-next-arrow.svg">
      <div class="card"><img src="https://www.naturepaysage.photo/wp-content/uploads/Nature-Paysage-portfolio-17-novembre-2019-0017-3.jpg" alt=""></div>
      <div id="prev-next-title">
        <h4>Suivant</h4>
        <h5>Lorem ipsum dolor sit amet</h5>
      </div>
    </a>
  </section>
  <img id="svg-footer" src="src/img/wave.svg">
  <footer id="footer-page">
    <div>
      <ul>
        <h4>Navigation</h4>
        <a href="/">
          <li>Accueil</li>
        </a>
        <a href="#creations">
          <li>Créations</li>
        </a>
        <a href="#a-propos">
          <li>À propos</li>
        </a>
        <a href="#contact">
          <li>Contact</li>
        </a>
      </ul>
      <ul>
        <h4>Me contacter</h4>
        <a href="#contact">
          <li>Formulaire de contact</li>
        </a>
        <a href="mailto:jade33.r@gmail.com">
          <li>Mail</li>
        </a>
        <a href="https://www.instagram.com/neonprod.uction/" target="_blank">
          <li>Instagram</li>
        </a>
        <a href="https://www.youtube.com/channel/UCzvOMfwEUwTLJBRwL_BTdwA" target="_blank">
          <li>Youtube</li>
        </a>
      </ul>
      <ul>
        <h4>Informations légales</h4>
        <a href="mentions-légales.html">
          <li>Mentions légales</li>
        </a>
        <a href="cookies.html">
          <li>Cookies</li>
        </a>
      </ul>
    </div>
    <div>
      <div>
        <a href="https://axelmarcial.com/" target="_blank"><img src="src/img/lepremieraxel.png" alt="logo de lepremieraxel"></a>
        <a href="https://victormoncassin.com/" target="_blank"><img src="src/img/racoon.svg" alt="logo de .racoon"></a>
        <a href="" target="_blank"><img src="src/img/spoun.png" alt="logo de spoun"></a>
      </div>
      <p>Designed and developed by <a href="https://axelmarcial.com/" target="_blank">lepremieraxel</a>, <a href="https://victormoncassin.com/" target="_blank">.racoon</a>, <a href="">Spoun</a> et Neon Prod.uction.</p>
      <p>&copy; Neon Prod.uction • 2022 • <a href="robert.html">for mme robert</a></p>
    </div>
  </footer>
  <script src="src/js/burger-menu.js"></script>
  <script src="src/js/fixed-go-home.js"></script>
</body>

</html>