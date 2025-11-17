
<?php
session_start();  

//get the data infomation
require "./require/dataConnexion.php"; 

if (isset($_SESSION["connecte"]) && $_SESSION["connecte"]) {
    echo '<p class="connexionMsgYes">Vous êtes connectée</p>';
} else {
    header("Location:connection.php");
    echo '<p class="connexionMsgNo">Vous n\'êtes pas connectée</p>';
}



//add the movie to the database

if ((isset($_POST["submit"]) && !empty($_POST["picture"]) ||!empty($_POST["title"])) ||!empty($_POST["description"]) ||!empty($_POST["urlVideo"])) {
    $title = htmlspecialchars($_POST["title"]);
    $description = htmlspecialchars($_POST["description"]);
    $video = htmlspecialchars($_POST["urlVideo"]);
    $picture = $_FILES["picture"]["name"];
      


    // send everything into the movies table
    if($title && $description && $video && $picture){
        $newMovie = $conn->prepare("INSERT INTO movies (title, description, urlphoto, urlvideo) VALUES (:value1, :value2, :value3, :value4)");
        $newMovie->bindValue(":value1",$title);
        $newMovie->bindValue(":value2",$description);
        $newMovie->bindValue(":value3",$picture);
        $newMovie->bindValue(":value4",$video);
        $newMovie->execute();  
        // header("Location:connection.php");exit;
    
    }  else {
        header("Location:admin.php");exit;
    }
}

//getting the picture and sending to data and dowloading it to reuse in movies list
if(isset($_FILES["picture"]) AND $_FILES["picture"]["error"] == 0){
    $dossierTelecharge = $_FILES["picture"]["tmp_name"];
    $dossierSauvergarde = $_FILES["picture"]["name"];
    $deplacer = move_uploaded_file($dossierTelecharge, "assets/" . $dossierSauvergarde);
        if($deplacer){
            echo 'votre film est bien ajouté';
        } else {
            echo "pas envoyé";
        }
} else

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
     <link rel="stylesheet" href="style.css"/>
</head>
<body>
     <?php require "./require/menu.php"; ?>
 <section>

    <h1> Ajoute ton film ici :</h1>
    <form action="" method="POST" class="addMovie" enctype="multipart/form-data">
        <input type="text" name="title" id="title" placeholder="Titre de ton film">

        <textarea name="description" id="description" placeholder="Sa description"></textarea>
        
        <div>
            <label for="picture">Choisis la photo qui représente ton film :</label>
            <input type="file" id="picture" name="picture" accept="image/*">
        </div>
        
        
        <input type="text" name="urlVideo" id="urlVideo" placeholder="Url de ton film">
        <input type="submit" value="Ajouter le film" class="submitMovie">
    </form>
</section>
</body>
</html>