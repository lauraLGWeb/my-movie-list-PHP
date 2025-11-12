<?php

//get the data infomation
$serveurName ='localhost';
$id = "root";
$password="root";
try {
$conn= new PDO("mysql:host=$serveurName;dbname=tp_netflixx_LEGALL_LAURA", $id,$password);
} catch (PDOExeption $e){
    echo "erreur" .$e->getMessage();
}

$getMovies = $conn->prepare("SELECT * FROM (SELECT * FROM movies ORDER BY id DESC LIMIT 5) x ORDER BY id ASC");
$getMovies->execute();
$result=$getMovies->fetchAll();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <nav>
        <div>
            <img src="assets/main.png" alt="" width=150px>
        </div>
        
        <ul>
            <div class="explore">  
                <li> <a href="accueil.php"> Accueil</a></li>
                <li> <a href="moviesList.php"> Tous nos films</a></li>
                <li> <a href="admin.php"> Espace Admin</a></li>
               
            </div>
            <div class="connect">
                <li><a href="inscription.php"> Inscription / </a></li>
                <li><a href="connection.php"> Connection</a></li>
            </div>

             <div class="deconnect">  
                 <li> <a href="#"> Me déconnecter </a></li>
            </div>
           
        </ul>
    </nav>
</header>

<main>
    <h1>Bonjour et bienvenue sur PixiePop </h1>
    <p>Votre site magique pour regarder vos films Disney préférés seul(e) ou accompagné(e) ! </p>
    <p>Explorez un univers féerique, regardez vos classiques ou vos nouveautés préférées. Pour ajouter des films et profiter pleinement de notre collection, créez votre compte et rejoignez la magie !</p>

    

<!-- foreach lign of data, get the picture title and trailer-->
<?php foreach($result as $movie): ?>
    <h2><?php echo $movie['title']; ?></h2>
    <p><?php echo $movie['description']; ?></p>
    <img src="assets/<?php echo $movie['urlphoto']; ?>" alt="">
<?php endforeach; ?>

</main>
    
</body>
</html>