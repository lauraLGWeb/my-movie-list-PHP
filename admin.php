
<?php
session_start();  

//get the data infomation
$serveurName ='localhost';
$id = "root";
$password="root";
try {
$conn= new PDO("mysql:host=$serveurName;dbname=tp_netflixx_LEGALL_LAURA", $id,$password);
} catch (PDOExeption $e){
    echo "erreur" .$e->getMessage();
}


//is someone connected ? 
if (!isset($_SESSION["connecte"]) || $_SESSION["connecte"] === false) {
    header("Location:accueil.php");exit;
} else {
    echo "vous etes connectée";
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
    $dossierTempo = $_FILES["picture"]["tmp_name"];
    $dossierSite = __DIR__."/assets/" . $picture;
    $deplacer = move_uploaded_file($dossierTempo, $dossierSite);
        if($deplacer){
            echo 'votre film est bien ajouté';
        } else {
            echo "pas envoyé";
        }
} else {
    echo "erreur";
}

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
 <section>
    <form action="" method="POST" class="addMovie" enctype="multipart/form-data">
        <input type="text" name="title" id="title" placeholder="Titre de ton film">

        <textarea name="description" id="description" placeholder="Sa description"></textarea>
        
        <label for="picture">Choisis la photo qui représente ton film :</label>
        <input type="file" id="picture" name="picture" accept="image/*">
        
        <input type="text" name="urlVideo" id="urlVideo" placeholder="Url de ton film">
        <input type="submit" value="Ajouter le film">
    </form>
</section>
</body>
</html>