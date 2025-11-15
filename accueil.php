<?php
session_start();  
require "./require/dataConnexion.php"; 

// Récupérer les 5 derniers films
$getMovies = $conn->prepare("SELECT * FROM (SELECT * FROM movies ORDER BY id DESC LIMIT 5) x ORDER BY id ASC");
$getMovies->execute();
$result = $getMovies->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - PixiePop</title>
    
    <link rel="stylesheet" href="http://localhost:8888/dw6/PHP/TP-PHP-LAURA/style.css">
</head>
<body>

<?php require "./require/connected.php"; ?>

<?php require "./require/menu.php"; ?>

<main>
    <h1>Bonjour et bienvenue sur PixiePop</h1>
    <p>Votre site magique pour regarder vos films Disney préférés seul(e) ou accompagné(e) !</p>
    <p>Explorez un univers féerique, regardez vos classiques ou vos nouveautés préférées. Pour ajouter des films et profiter pleinement de notre collection, créez votre compte et rejoignez la magie !</p>

    <section class="movies">
    <?php foreach($result as $movie): ?>
        <div class="movie-card">
            <img class="movie-img" src="assets/<?php echo $movie['urlphoto']; ?>" alt="<?php echo $movie['title']; ?>">
            <h2><?php echo $movie['title']; ?></h2>
            <p><?php echo $movie['description']; ?></p>
        </div>
    <?php endforeach; ?>
    </section>
</main>

</body>
</html>
