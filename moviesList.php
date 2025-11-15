<?php
session_start(); 
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

<main class="mainList">
    <!-- foreach lign of data, get the picture title and trailer-->
    <?php foreach($result as $movie): ?>
        <div class="movie-card-list">
            <h2><?php echo $movie['title']; ?></h2>
            <a href="details.php?id=<?php echo $movie['id'];?>"> Consulter ce film</a>
            <p><?php echo $movie['description']; ?></p>
            <img class="moviepic"src="assets/<?php echo $movie['urlphoto']; ?>" alt="" height="300">
           
        </div>
                <?php endforeach; ?>
        
</main>





    
</body>
</html>