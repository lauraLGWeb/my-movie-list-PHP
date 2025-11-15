
<?php
session_start();  
require "./require/dataConnexion.php"; 

if ((isset($_POST["submit"]) && (!empty($_POST["user"])) || !empty($_POST["password"]))) {
    $user = htmlspecialchars($_POST["user"]);
    $password = htmlspecialchars($_POST["password"]);
    if($user && $password){
        $newUser = $conn->prepare("INSERT INTO user_name (user, password) VALUES (:value1, :value2)");
        $newUser->bindValue(":value1",$user);
        $newUser->bindValue(":value2",$password);
        $newUser->execute();  
        header("Location:connection.php");exit;
    }   
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
           
            <input type="password" name="password" id="password" placeholder="Mot de passe">
           
            <br>

            <input type="submit" name="submit" id="submit" value="Créer mon compte" class="submitMovie">

        </form>
       
        </section>






    
</body>
</html>