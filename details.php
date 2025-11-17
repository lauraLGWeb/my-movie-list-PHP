<?php
session_start(); 
//get the data infomation
require "./require/dataConnexion.php"; 
// get the id of the url to locate on the movie page


$getMovie = $conn->prepare("SELECT * FROM movies WHERE id=:id");
$getMovie -> bindParam(":id", $_GET["id"]);
$getMovie->execute();
$result=$getMovie->fetch();

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Page d'inscription - Gestion des clients</title>
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="style.css?v=2">
</head>
<body>
   <?php require "./require/menu.php"; ?>
   <section>
      <section class="presentation">        
        <div class="titleDescription">
            <h2><?php echo $result['title']; ?></h2>
            <p><?php echo $result['description']; ?></p>
        </div>
        <div class="imageDetail">
            <img src="assets/<?php echo $result['urlphoto']; ?>" alt="" height="300">
        </div>
      </section >   

        <iframe  src="<?php echo $result['urlvideo'];?>" title="<?php echo $result['title']; ?> : bande annonce" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            
    
    </section>

</body>
</html>