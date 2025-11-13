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

$getMovies = $conn->prepare("SELECT * FROM movies");
$getMovies->execute();
$result=$getMovies->fetchAll();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
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
                 <?php if((isset($_SESSION["connecte"]) && $_SESSION["connecte"] === true)){
                    echo "<li> <a href='http://localhost:8888/dw6/PHP/TP-PHP-LAURA/deconnexion.php'>  Me déconnecter </a></li>";
                }
                 ?>
            </div>
           
        </ul>
    </nav>
</header>

<main>
<!-- foreach lign of data, get the picture title and trailer-->
<?php 
    <h2><?php echo $movie['title']; ?></h2>
    <p><?php echo $movie['description']; ?></p>
    <img src="assets/<?php echo $movie['urlphoto']; ?>" alt="">
    <a href="movie.php"> Consulter ce film</a>
    ?>


</main>





    
</body>
</html>