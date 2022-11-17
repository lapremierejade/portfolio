<!DOCTYPE html>
<html lang="fr">

<head>
  <?php include_once('../src/includes/head.html'); ?>
  <title>admin • neon prod.uction</title>
</head>

<body>
  <?php include_once('../src/includes/header.html');
  require_once '../src/php/config.php';
  $prepare = $db->prepare('SELECT * FROM creations WHERE id = ?');
  $prepare->execute(array($_GET['id']));
  $creation = $prepare->fetch();
  ?>
  <div class="container">
    <section class="add" id="update-creations">
      <h3>Mettre à jour <?php echo $creation['title']; ?></h3>
      <?php if (isset($_GET['update'])) {
        $err = htmlspecialchars($_GET['update']);
        switch ($err) {
          case 'form':
            echo "<p class='form-alert form-false'>Le formulaire n'est pas rempli correctement.</p>";
            break;
        }
      } ?>
      <div class="section-line">
        <form action="update-creations.php" method="POST">
          <div>
            <span>
              <label for="title">Titre du projet</label>
              <input type="text" name="title" id="title" placeholder="titre-du-projet" required value='<?php echo $creation['title']; ?>'>
            </span>
            <span>
              <label for="type">Type</label>
              <input type="text" name="type" id="type" placeholder="type du projet" required value='<?php echo $creation['type']; ?>'>
            </span>
            <span>
              <label for="tool">Outils (logiciels, technologies, ...)</label>
              <input type="text" name="tool" id="tool" placeholder="outils, logiciels & technologies" required value='<?php echo $creation['tool']; ?>'>
            </span>
          </div>
          <span>
            <label for="text">Texte</label>
            <textarea type="text" name="text" id="text" placeholder="Un texte explicatif du projet." required><?php echo $creation['text']; ?></textarea>
          </span>
          <div>
            <span>
              <label for="users">Collaborateur·trice·s</label>
              <input type="text" name="users" id="users" placeholder="1,2,3" required value='<?php echo $creation['users']; ?>'>
            </span>
            <span>
              <label for="imgs">Image·s</label>
              <input type="text" name="imgs" id="imgs" placeholder="1,2,3" required value='<?php echo $creation['imgs']; ?>'>
            </span>
          </div>
          <input type="submit" value="Mettre à jour">
        </form>
        <p>NE PAS OUBLIER DE RESPECTER LE FORMAT PRÉCISÉ DANS CHAQUE CHAMPS !<br>Le titre du projet doit être écrit en minuscule avec un tiret (-) entre chaque mot. Le type doit être écrit en minuscule avec des espaces si nécessaire. Les outils doivent être écrit en minuscule avec des virgules (, ) entre chaque mot et une esperluette (&) avant le dernier mot. Le texte peut être écrit de n'importe quelle façon. Les collaborat·eur·rice·s doivent être écrit avec des chiffres, leur "id", séparé par des virgules (,). L'id 1 correspond à "Neon Prod.uction". Les images doivent être écrites avec des chiffres, leur "id", séparé par des virgules (,).</p>
      </div>
    </section>
  </div>
  <?php include_once('../src/includes/footer.html'); ?>
</body>

</html>