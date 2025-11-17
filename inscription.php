
<?php
session_start();  
require "./require/dataConnexion.php"; 

if ((isset($_POST["submit"]) && (!empty($_POST["user"])) && !empty($_POST["password"]))) {
    echo "ok";
    $user = htmlspecialchars($_POST["user"]);
    $password = htmlspecialchars($_POST["password"]);
    $hash = password_hash($password, PASSWORD_DEFAULT);
    if($user && $hash){
        $newUser = $conn->prepare("INSERT INTO user_name (user, password) VALUES (:value1, :value2)");
        $newUser->bindValue(":value1",$user);
        $newUser->bindValue(":value2",$hash);
        $newUser->execute();  
        header("Location:connection.php");exit;
    }   
} else {
    echo 
    "<h3>Merci de remplir identifiant et mot de passe</h3>";

}
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
<section>
        <div>
            <h1>Formulaire D'inscription</h1>
           
        </div>
        <form action="" method="POST">
           
            <span class="userInput"><input type="text" name="user" id="user" placeholder="Nom d'utilisateur"></span>
            <br>
           
            <div class="password">
                <input type="password" name="password" id="password" placeholder="Mot de passe">
                <img class="eye" src="assets/oeil.png" alt="oeil visible">
             </div>
            <br>

            <input type="submit" name="submit" id="submit" value="Créer mon compte" class="submitMovie">

        </form>
       
        </section>






   <script src="main.js"></script> 
</body>
</html>