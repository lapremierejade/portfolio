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
  <title>accueil • neon prod.uction</title>
</head>

<body>
  <?php include("src/includes/header.html"); ?>
  <section id="hero">
    <div id="hero-title">
      <h1>Neon Prod.uction</h1>
      <h2>Jade • 20 • mmi • tarbes/bdx/tlse</h2>
    </div>
    <a href="#contact" id="hero-cta">Contacte moi</a>
    <div id="hero-scroll">
      <img src="src/img/scroll-icon.svg">
      <img id="hero-scroll-anim" src="src/img/down-arrow.svg">
    </div>
  </section>
  <section id="creations">
    <h3>Mes créations</h3>
    <div class="galery">
      <?php require_once('src/php/config.php');
      $prepare = $db->prepare('SELECT * FROM creations');
      $prepare->execute();
      $creations = $prepare->fetchAll();
      // print_r($creations);
      foreach ($creations as $creation) {
        // print_r($creation);
        $tabNumImg = explode(",", $creation['imgs']);
        // print_r($tabNumImg);
        $numImg = array_slice($tabNumImg, 0, 1);
        $imageSelected = $db->prepare('SELECT * FROM images WHERE id = ?');
        $imageSelected->execute($numImg);
        $image = $imageSelected->fetch();
        // print_r($image['link']);
        echo '<a href="page.php?id=' . $creation['id'] . '&title=' . $creation['title'] . '"><div class="card"><img src="' . $image['link'] . '"></div></a>';
      }
      ?>
    </div>
  </section>
  <section id="a-propos">
    <h3>À propos de moi</h3>
    <div class="about-tab">
      <div class="about-case about-case-1">
        <h4>Lorem</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean scelerisque turpis vitae ipsum rutrum, eu vestibulum sapien posuere. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Curabitur ornare turpis vel massa fringilla dapibus. Nulla facilisi. Donec ut massa sollicitudin, convallis odio a, commodo magna. Maecenas tempor molestie suscipit. Sed vehicula elit at lacus imperdiet faucibus.</p>
      </div>
      <div class="about-case about-case-2">
        <h4>Lorem</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean scelerisque turpis vitae ipsum rutrum, eu vestibulum sapien posuere. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Curabitur ornare turpis vel massa fringilla dapibus. Nulla facilisi. Donec ut massa sollicitudin, convallis odio a, commodo magna. Maecenas tempor molestie suscipit. Sed vehicula elit at lacus imperdiet faucibus.</p>
      </div>
      <div class="about-case about-case-3">
        <h4>Lorem</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean scelerisque turpis vitae ipsum rutrum, eu vestibulum sapien posuere. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Curabitur ornare turpis vel massa fringilla dapibus. Nulla facilisi. Donec ut massa sollicitudin, convallis odio a, commodo magna. Maecenas tempor molestie suscipit. Sed vehicula elit at lacus imperdiet faucibus.</p>
      </div>
      <div class="about-case about-case-4">
        <h4>Lorem</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean scelerisque turpis vitae ipsum rutrum, eu vestibulum sapien posuere. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Curabitur ornare turpis vel massa fringilla dapibus. Nulla facilisi. Donec ut massa sollicitudin, convallis odio a, commodo magna. Maecenas tempor molestie suscipit. Sed vehicula elit at lacus imperdiet faucibus.</p>
      </div>
      <div class="about-case about-case-5">
        <h4>Lorem</h4>
        <div class="about-skills">
          <div class="about-skill">
            <div class="img about-img-1"></div>
            <div class="text">
              <h5>Lorem ipsum</h5>
              <p>Lorem ispum dolor</p>
            </div>
          </div>
          <div class="about-skill">
            <div class="img about-img-2"></div>
            <div class="text">
              <h5>Lorem ipsum</h5>
              <p>Lorem ispum dolor</p>
            </div>
          </div>
          <div class="about-skill">
            <div class="img about-img-3"></div>
            <div class="text">
              <h5>Lorem ipsum</h5>
              <p>Lorem ispum dolor</p>
            </div>
          </div>
          <div class="about-skill">
            <div class="img about-img-4"></div>
            <div class="text">
              <h5>Lorem ipsum</h5>
              <p>Lorem ispum dolor</p>
            </div>
          </div>
          <div class="about-skill">
            <div class="img about-img-5"></div>
            <div class="text">
              <h5>Lorem ipsum</h5>
              <p>Lorem ispum dolor</p>
            </div>
          </div>
          <div class="about-skill">
            <div class="img about-img-6"></div>
            <div class="text">
              <h5>Lorem ipsum</h5>
              <p>Lorem ispum dolor</p>
            </div>
          </div>
        </div>
      </div>
      <div class="about-case about-case-6">
        <h4>Lorem</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean scelerisque turpis vitae ipsum rutrum, eu vestibulum sapien posuere. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Curabitur ornare turpis vel massa fringilla dapibus. Nulla facilisi. Donec ut massa sollicitudin, convallis odio a, commodo magna. Maecenas tempor molestie suscipit. Sed vehicula elit at lacus imperdiet faucibus.</p>
      </div>
    </div>
  </section>
  <section id="contact">
    <img src="src/img/wave.svg">
    <div class="contact-container">
      <div class="contact-me">
        <h3>Me contacter</h3>
        <form action="src/php/form.php" method="post">
          <div class="form-line form-names">
            <div>
              <label for="name">Nom</label>
              <input type="text" name="name" id="name" required>
            </div>
            <div>
              <label for="firstname">Prénom</label>
              <input type="text" name="firstname" id="firstname" required>
            </div>
          </div>
          <div>
            <label for="email">Adresse email</label>
            <input type="email" name="email" id="email" required>
          </div>
          <div class="form-line form-subject">
            <div>
              <label for="subject">Objet du message</label>
              <input type="text" name="subject" id="subject" required>
            </div>
            <div>
              <label for="motif">Motif</label>
              <select name="motif" id="motif" required>
                <option value="">Choisissez un motif</option>
                <option value="infos">Informations</option>
                <option value="order">Prestations</option>
                <option value="other">Autre</option>
              </select>
            </div>
          </div>
          <div>
            <label for="message">Message</label>
            <textarea name="message" id="message" required></textarea>
          </div>
          <input type="submit" value="Envoyer">
        </form>
      </div>
      <div class="separator"></div>
      <div class="my-networks">
        <h3>Mes réseaux</h3>
        <div class="list-networks">
          <ul>
            <a href="https://www.instagram.com/neonprod.uction/" target="_blank">
              <li>
                <img src="src/img/icon-instagram.svg">
              </li> @neonprod.uction
            </a>
            <a href="https://www.youtube.com/channel/UCzvOMfwEUwTLJBRwL_BTdwA" target="_blank">
              <li>
                <img src="src/img/icon-youtube.svg">
              </li> @neonprod.uction
            </a>
            <a href="mailto:jade33.r@gmail.com">
              <li>
                <img src="src/img/icon-mail.svg">
              </li> jade33.r@gmail.com
            </a>
          </ul>
          <ul>
            <a href="https://goo.gl/maps/KobiuMbs4Hce6NQm6" target="_blank">
              <li>
                <img src="src/img/icon-map-pin.svg">
              </li> Tarbes
            </a>
            <a href="https://goo.gl/maps/utnZJoMK8hrNWiJZ7" target="_blank">
              <li>
                <img src="src/img/icon-map-pin.svg">
              </li> Bordeaux
            </a>
            <a href="https://goo.gl/maps/u2bf4KQyxWwQFGGA7" target="_blank">
              <li>
                <img src="src/img/icon-map-pin.svg">
              </li> Toulouse
            </a>
          </ul>
        </div>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean scelerisque turpis vitae ipsum rutrum, eu vestibulum sapien posuere. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Curabitur ornare turpis vel massa fringilla dapibus. Nulla facilisi. Donec ut massa sollicitudin, convallis odio a, commodo magna. Maecenas tempor molestie suscipit. Sed vehicula elit at lacus imperdiet faucibus.</p>
      </div>
    </div>
    <img src="src/img/wave.svg" id="svg-inverse">
  </section>
  <footer>
    <div>
      <ul>
        <h4>Navigation</h4>
        <a href="#hero">
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
        <a href="mentions-legales.html">
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
  <script src="src/js/fixed-nav.js"></script>
</body>

</html>