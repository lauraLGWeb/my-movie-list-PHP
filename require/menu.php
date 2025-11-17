<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <nav>
        <div>
            <img class="img" src="assets/main.png" alt="" width=150px>
        </div>
        
        <ul>
            <div class="explore">  
                <li> <a href="accueil.php"> Accueil</a></li>
                <li> <a href="moviesList.php"> Tous nos films</a></li>
                <li> <a href="admin.php"> Espace Admin</a></li>
                <li><a href="inscription.php"> Inscription    </a></li>
                <li><a href="connection.php"> Connection</a></li>
            </div>

            <div class="deconnect">  
                <?php if((isset($_SESSION["connecte"]) && $_SESSION["connecte"] === true)){
                    echo "<li class='deconnect'> <a href='http://localhost:8888/dw6/PHP/TP-PHP-LAURA/deconnexion.php'>  Me déconnecter </a></li>";
                }
                 ?>
                 
            </div>
           
        </ul>
    </nav>
</header>

</body>
</html>