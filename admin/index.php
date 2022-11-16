<!DOCTYPE html>
<html lang="fr">

<head>
  <?php include_once('../src/includes/head.html'); ?>
  <!-- TITLE -->
  <title>admin • neon prod.uction</title>
</head>

<body>
  <?php include_once('../src/includes/header.html'); ?>
  <div class="container">
    <section class="add" id="add-creations">
      <h3>Ajouter une création</h3>
      <div class="section-line">
        <form action="add-creations.php" method="POST">
          <div>
            <span>
              <label for="title">Titre du projet</label>
              <input type="text" name="title" id="title" placeholder="titre-du-projet" required>
            </span>
            <span>
              <label for="type">Type</label>
              <input type="text" name="type" id="type" placeholder="type du projet" required>
            </span>
            <span>
              <label for="tool">Outils (logiciels, technologies, ...)</label>
              <input type="text" name="tool" id="tool" placeholder="outils, logiciels & technologies" required>
            </span>
          </div>
          <span>
            <label for="text">Texte</label>
            <textarea type="text" name="text" id="text" placeholder="Un texte explicatif du projet." required></textarea>
          </span>
          <div>
            <span>
              <label for="users">Collaborat·eur·rice·s</label>
              <input type="text" name="users" id="users" placeholder="1,2,3" required>
            </span>
            <span>
              <label for="imgs">Image·s</label>
              <input type="text" name="imgs" id="imgs" placeholder="1,2,3" required>
            </span>
          </div>
          <input type="submit" value="Ajouter">
        </form>
        <p>NE PAS OUBLIER DE RESPECTER LE FORMAT PRÉCISÉ DANS CHAQUE CHAMPS !<br>Le titre du projet doit être écrit en minuscule avec un tiret (-) entre chaque mot. Le type doit être écrit en minuscule avec des espaces si nécessaire. Les outils doivent être écrit en minuscule avec des virgules (, ) entre chaque mot et une esperluette (&) avant le dernier mot. Le texte peut être écrit de n'importe quelle façon. Les collaborat·eur·rice·s doivent être écrit avec des chiffres, leur "id", séparé par des virgules (,). L'id 1 correspond à "Neon Prod.uction". Les images doivent être écrites avec des chiffres, leur "id", séparé par des virgules (,).</p>
      </div>
    </section>
    <section class="add" id="add-images">
      <h3>Ajouter une image</h3>
      <div class="section-line">
        <form action="add-images.php" method="POST" enctype="multipart/form-data">
          <div>
            <span>
              <label for="img-file">Choisir une image</label>
              <input type="file" name="img-file" id="img-file" accept="image/*" required>
            </span>
          </div>
          <input type="submit" name="submit" value="Ajouter">
        </form>
      </div>
    </section>
  </div>
  <?php include_once('../src/includes/footer.html'); ?>
</body>

</html>