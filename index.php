<!DOCTYPE html>
<html lang="fr">

<head>
  <?php include("src/includes/head.html"); ?>
  <title>accueil • neon prod.uction</title>
</head>

<body>
  <?php include("src/includes/header.html"); ?>
  <section id="hero">
    <div id="hero-title">
      <h1>Neon Prod.uction</h1>
      <h2>Jade • 20 • mmi • Tarbes/Bdx/Tlse</h2>
    </div>
    <a href="/#contact" id="hero-cta">Contacte moi</a>
    <div id="hero-scroll">
      <img src="/src/img/scroll-icon.svg">
      <img id="hero-scroll-anim" src="/src/img/down-arrow.svg">
    </div>
  </section>
  <section id="creations">
    <h3>Mes créations</h3>
    <div class="galery">
      <?php require_once('src/php/config.php');
      $prepare = $db->prepare('SELECT * FROM creations');
      $prepare->execute();
      $creations = $prepare->fetchAll();
      foreach ($creations as $creation) {
        $tabNumImg = explode(",", $creation['imgs']);
        $numImg = array_slice($tabNumImg, 0, 1);
        $imageSelected = $db->prepare('SELECT * FROM images WHERE id = ?');
        $imageSelected->execute($numImg);
        $image = $imageSelected->fetch();
        echo '<a href="/creations/' . $creation['title'] . '"><div class="card"><img src="' . $image['link'] . '"></div></a>';
      }
      ?>
    </div>
  </section>
  <section id="a-propos">
    <h3>À propos de moi</h3>
    <div class="about-tab">
      <div class="about-case about-case-1">
        <h4>Présentation</h4>
        <p>Je m'appelle Jade, j’ai actuellement 20 ans. J’habite dans la région Occitanie mais j’ai la possibilité de me déplacer en Nouvelle-Aquitaine mais aussi en région PACA. Je suis titulaire du permis B et véhiculée. Je suis en deuxième année de Bachelor dans les Métiers du Multimédia et de l’Internet en alternance. Cette dernière se déroule dans une concession automobile. Je réalise leur communication sur les réseaux sociaux pour une durée de 2 ans.</p>
      </div>
      <div class="about-case about-case-2">
        <h4>Mes passions</h4>
        <p>Je m’intéresse à beaucoup de choses, depuis que je suis petite, j’aime beaucoup le monde du spectacle vivant, j’ai pratiqué le théâtre pendant 8 ans dans une troupe de campagne. J’adore regarder et analyser des films, je le fais de plus en plus car dans mes études nous avons des cours d’analyses cinématographiques. Depuis peu de temps, je m’intéresse au monde de l’automobile. Etant une personne très manuelle, j’aime me pencher sur les différents soucis que l’on peut avoir sur son véhicule et apprendre à les résoudre. Chaque jour, de nouvelles choses attisent ma curiosité et mon envie d’apprendre. J’aime beaucoup découvrir de nouvelles choses et essayer de comprendre leur fonctionnement.</p>
      </div>
      <div class="about-case about-case-3">
        <h4>Service civique en communication à l’Université de Bordeaux</h4>
        <p>Pendant 9 mois durant l’année scolaire 2020/2021, j’ai réalisé un service civique en médiation associative et animation de campus à la faculté de Biologie de Talence. Cette expérience fut très enrichissante par rapport à la gestion de projet, la création de visuels et la gestion des réseaux sociaux. Pendant ces 9 mois, j’ai notamment réalisé et animé des soirées diffusion de courts-métrages en distanciel, j’ai aidé à l’animation et la création d’un jeu de piste dans Bordeaux.</p>
      </div>
      <div class="about-case about-case-4">
        <h4>Engagements associatifs et bénévoles</h4>
        <p>Pendant un an, j’ai été membre de l’association de mon lycée qui avait pour but de créer des projets pour occuper les élèves, notamment internes, lors de soirées d’animation. Lors de mes études supérieures, j’ai été présidente du Bureau des Etudiants de ma formation. Cette expérience m’a appris à mieux gérer des projets, trouver des plans B en cas d’annulation, gérer des groupes de personnes plus ou moins grands (de 50 à 150 personnes). J’avais beaucoup de responsabilités, grâce à ça, j’ai appris à déléguer des tâches et à faire confiance à mon équipe. Pendant l’année 2022, j’ai participé à un tournage pour YouTube sur la chaîne de Squeezie où le concept était un 'Où est Charlie" géant. Nous étions 1500 figurants. Cette expérience fut très enrichissante et m’a permis de découvrir que je souhaite travailler sur ce genre de tournages plus tard, les organiser, les encadrer et toutes les contraintes qui vont avec m’intéresse vraiment.</p>
      </div>
      <div class="about-case about-case-5">
        <h4>Lorem</h4>
        <div class="about-skills">
          <div class="about-skill">
            <div class="img about-img-1"></div>
            <div class="text">
              <h5>Photoshop</h5>
              <p>Lorem ispum dolor</p>
            </div>
          </div>
          <div class="about-skill">
            <div class="img about-img-2"></div>
            <div class="text">
              <h5>Illustrator</h5>
              <p>Lorem ispum dolor</p>
            </div>
          </div>
          <div class="about-skill">
            <div class="img about-img-3"></div>
            <div class="text">
              <h5>Premiere Pro</h5>
              <p>Lorem ispum dolor</p>
            </div>
          </div>
          <div class="about-skill">
            <div class="img about-img-4"></div>
            <div class="text">
              <h5>InDesign</h5>
              <p>Lorem ispum dolor</p>
            </div>
          </div>
          <div class="about-skill">
            <div class="img about-img-5"></div>
            <div class="text">
              <h5>Microsoft Office</h5>
              <p>Lorem ispum dolor</p>
            </div>
          </div>
          <div class="about-skill">
            <div class="img about-img-6"></div>
            <div class="text">
              <h5>Appareil photo et caméra</h5>
              <p>Lorem ispum dolor</p>
            </div>
          </div>
        </div>
      </div>
      <div class="about-case about-case-6">
        <h4>Mes compétences</h4>
        <p>Encore dans les études, je suis en train de faire grandir mes compétences sur la suite Adobe, notamment Photoshop, Illustrator, Premiere pro et InDesign. Je suis junior dans ces milieux mais petit à petit j'approfondis mes connaissances et mes travaux deviennent de plus en plus complets et travaillés. J’ai aussi de bonnes connaissances sur la suite Microsoft Office. Je suis à l’aise devant une caméra comme derrière celle-ci. Pendant mes études, nous touchons beaucoup au monde de l’audiovisuel, j’aime beaucoup cet aspect de ma formation, il nous permet de développer et laisser parler notre créativité.</p>
      </div>
    </div>
  </section>
  <section id="contact">
    <img src="/src/img/wave.svg">
    <div class="contact-container">
      <div class="contact-me">
        <h3>Me contacter</h3>
        <?php if (isset($_GET['send'])) {
          $send = htmlspecialchars($_GET['send']);
          switch ($send) {
            case 'true':
              echo "<p class='form-alert form-true'>Votre message a bien été envoyé.</p>";
              break;
            case 'false':
              echo "<p class='form-alert form-false'>Votre message n'a pas été envoyé. Veuillez remplir tous les champs et réessayez.</p>";
              break;
          }
        } ?>
        <form action="/src/php/form.php" method="post">
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
                <img src="/src/img/icon-instagram.svg">
              </li> @neonprod.uction
            </a>
            <a href="https://www.youtube.com/channel/UCzvOMfwEUwTLJBRwL_BTdwA" target="_blank">
              <li>
                <img src="/src/img/icon-youtube.svg">
              </li> @neonprod.uction
            </a>
            <a href="mailto:jade33.r@gmail.com">
              <li>
                <img src="/src/img/icon-mail.svg">
              </li> jade33.r@gmail.com
            </a>
          </ul>
          <ul>
            <a href="https://goo.gl/maps/KobiuMbs4Hce6NQm6" target="_blank">
              <li>
                <img src="/src/img/icon-map-pin.svg">
              </li> Tarbes
            </a>
            <a href="https://goo.gl/maps/utnZJoMK8hrNWiJZ7" target="_blank">
              <li>
                <img src="/src/img/icon-map-pin.svg">
              </li> Bordeaux
            </a>
            <a href="https://goo.gl/maps/u2bf4KQyxWwQFGGA7" target="_blank">
              <li>
                <img src="/src/img/icon-map-pin.svg">
              </li> Toulouse
            </a>
          </ul>
        </div>
        <p>N'hésitez pas à me contacter, je me ferais un plaisir de répondre à vos questions. Que ça soit pour une simple question, pour avoir des informations supplémentaires sur moi ou mes compétences ou pour me proposer un projet intéressant. Si vous voulez en voir plus je suis aussi disponible sur YouTube et Instagram. Vous pouvez même prendre un rendez-vous avec moi sur Tarbes, Bordeaux ou Toulouse.</p>
      </div>
    </div>
    <img src="/src/img/wave.svg" id="svg-inverse">
  </section>
  <footer>
    <div>
      <ul>
        <h4>Navigation</h4>
        <a href="/">
          <li>Accueil</li>
        </a>
        <a href="/#creations">
          <li>Créations</li>
        </a>
        <a href="/#a-propos">
          <li>À propos</li>
        </a>
        <a href="/#contact">
          <li>Contact</li>
        </a>
      </ul>
      <ul>
        <h4>Me contacter</h4>
        <a href="/#contact">
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
        <a href="/pages/mentions-legales">
          <li>Mentions légales</li>
        </a>
        <a href="/pages/cookies">
          <li>Cookies</li>
        </a>
      </ul>
    </div>
    <div>
      <div>
        <a href="https://axelmarcial.com/" target="_blank"><img src="/src/img/lepremieraxel.png" alt="logo de lepremieraxel" /></a>
        <a href="https://victormoncassin.com/" target="_blank"><img src="/src/img/racoon.svg" alt="logo de .racoon" /></a>
        <a href="" target="_blank"><img src="/src/img/spoun.png" alt="logo de spoun" /></a>
      </div>
      <p>
        Designed and developed by
        <a href="https://axelmarcial.com/" target="_blank">lepremieraxel</a>,
        <a href="https://victormoncassin.com/" target="_blank">.racoon</a>,
        <a href="">Spoun</a> et Neon Prod.uction.
      </p>
      <p>
        &copy; Neon Prod.uction • 2022 •
        <a href="/pages/a-propos-mmi">for mme robert</a>
      </p>
    </div>
  </footer>
  <script src="/src/js/burger-menu.js"></script>
</body>

</html>