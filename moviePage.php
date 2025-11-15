<?php
//get the data infomation
require "./require/dataConnexion.php"; 

$getMovies = $conn->prepare("SELECT * FROM movies");
$getMovies->execute();
$result=$getMovies->fetchAll();

?>
<?php require "./require/connected.php"; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
   <?php require "./require/menu.php"; ?>

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


