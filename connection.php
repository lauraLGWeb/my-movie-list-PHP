<?php
session_start();  

require "./require/dataConnexion.php";  

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
<?php require "./require/connected.php"; ?>








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
        <div>
            <h1> Connecte toi !</h1>
           
        </div>
        <form action="" method="POST">
           
            <span class="userInput"><input type="text" name="user" id="user" placeholder="Nom d'utilisateur"></span>
            <br>

           
            <input type="password" name="password" id="password" placeholder="Mot de passe">
            <br>

            <input type="submit" name="submit" id="submit" value="Se connecter" class="submitMovie">

        </form>
       
        </section>
</body>
</html>