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
              <label for="users">Collaborateur·trice·s</label>
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
              <label for="file-img">Choisir une image</label>
              <input type="file" name="file-img" id="file-img" accept="image/*" required>
            </span>
          </div>
          <input type="submit" name="submit-images" value="Ajouter">
        </form>
        <p>Il est préférable de nommer les fichiers sans espace. On peut ajouter une seule image à la fois. L'image sera envoyée sur le serveur dans 'src/uploads/'.</p>
      </div>
    </section>
    <section id="add-users" class="add">
      <h3>Ajouter un·e collaborateur·trice</h3>
      <div class="section-line">
        <form action="add-users.php" method="post" enctype="multipart/form-data">
          <div>
            <span>
              <label for="pseudo">Nom</label>
              <input type="text" name="pseudo" id="pseudo" placeholder="Nom ou pseudo" reauired>
            </span>
            <span>
              <label for="file-user">Logo ou photo de profil</label>
              <input type="file" name="file-user" id="file-user" accept="image/*" required>
            </span>
          </div>
          <div>
            <span>
              <label for="link">Lien du profil</label>
              <input type="text" name="link" id="link" placeholder="https://lien-du-profil.exemple" required>
            </span>
          </div>
          <input type="submit" name="submit-users" value="Ajouter">
        </form>
        <p>Le nom peut être écrit en minuscule, majuscule et avec des espaces. Il est préférable que le nom du fichier pour le logo ne contiennent pas d'espace. Si l'utilisateur ne dispose pas de lien, il suffit de mettre seulement un '/'.</p>
      </div>
    </section>
    <section id="all-creations" class="all">
      <h3>Toutes les créations</h3>
      <div class="galery">
        <?php require_once('../src/php/config.php');
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
          echo '<div class="card"><img src="' . $image['link'] . '"><div><p>' . $creation['title'] . '</p><p>ID = ' . $creation['id'] . '</p><a href="/creations/' . $creation['title'] . '" target="_blank" class="see">Voir</a><a href="update.php?id=' . $creation['id'] . '" class="modify" target="_blank">Modifier</a><form method="post" action="del-creations.php"><input type="hidden" name="crea-id" value="' . $creation['id'] . '"><input type="submit" name="submit-del-creations" class="del-btn" value="Supprimer"></form></div></div>';
        }
        ?>
      </div>
    </section>
    <section id="all-images" class="all">
      <h3>Toutes les images</h3>
      <div class="galery">
        <?php require_once('../src/php/config.php');
        $prepare = $db->prepare('SELECT * FROM images');
        $prepare->execute();
        $images = $prepare->fetchAll();
        // print_r($creations);
        foreach ($images as $image) {
          // print_r($image['link']);
          echo '<div class="card"><img src="' . $image['link'] . '"><div><p>ID = ' . $image['id'] . '</p><form method="post" action="del-images.php"><input type="hidden" name="img-id" value="' . $image['id'] . '"><input type="submit" class="del-btn" name="submit-del-images" value="Supprimer"></form></div></div>';
        }
        ?>
      </div>
    </section>
    <section id="all-users" class="all">
      <h3>Toutes les collaborateurs·rices</h3>
      <ul>
        <?php require_once('../src/php/config.php');
        $prepare = $db->prepare('SELECT * FROM users');
        $prepare->execute();
        $users = $prepare->fetchAll();
        // print_r($creations);
        foreach ($users as $user) {
          // print_r($image['link']);
          echo '<li><img src="' . $user['img'] . '"><p>' . $user['name'] . '</p><p>ID = ' . $user['id'] . '</p><form method="post" action="del-users.php"><input type="hidden" name="user-id" value="' . $user['id'] . '"><input type="submit" class="del-btn" name="submit-del-users" value="Supprimer"></form></li>';
        }
        ?>
  </div>
  </section>
  </div>
  <?php include_once('../src/includes/footer.html'); ?>
</body>

</html>