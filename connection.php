
<?php
session_start();  
$serveurName ='localhost';
$id = "root";
$password="root";

try {
$conn= new PDO("mysql:host=$serveurName;dbname=tp_netflixx_LEGALL_LAURA", $id,$password);
} catch (PDOException $e){
    echo "erreur" .$e->getMessage();
}
    

if (isset($_POST["submit"])){
    if(!empty($_POST["user"]) && !empty($_POST["password"]) ){
        //get the writing items
        $user = htmlspecialchars($_POST["user"]);
        $password = htmlspecialchars($_POST["password"]);
       //get the user from data 
        $getUser=$conn->prepare("SELECT * FROM user_name WHERE user=:user");
        $getUser->bindParam(":user", $user);
        $getUser->execute();
        $getResult= $getUser-> fetch();
        // comparing between data and form
        if($getResult){
                if($password ===  $getResult["password"]){
                 $_SESSION["connecte"] = true; 
                header("Location:admin.php");
                } else {
                $_SESSION["connecte"] = false;
                echo "mauvais mot de passe";
                }
            } else {
                echo "<h3> Login ou mot de passe incorrect <h3>";
                $_SESSION["connecte"] = false;
        }
    }
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
<body><header>
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
        <div>
            <h1> Connecte toi !</h1>
           
        </div>
        <form action="" method="POST">
           
            <span class="userInput"><input type="text" name="user" id="user" placeholder="Nom d'utilisateur"></span>
            <br>

           
            <input type="password" name="password" id="password" placeholder="Mot de passe">
            <br>

            <input type="submit" name="submit" id="submit" value="Se connecter">

        </form>
       
        </section>
</body>
</html>