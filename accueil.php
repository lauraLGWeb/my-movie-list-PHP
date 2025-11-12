<?php

$serveurName ='localhost';
$id = "root";
$password="root";
try {
$conn= new PDO("mysql:host=$serveurName;dbname=tp_netflixx_LEGALL_LAURA", $id,$password);
} catch (PDOExeption $e){
    echo "erreur" .$e->getMessage();
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
</head>
<body>


<h1>Bonjour, quels films souhaites tu regarder ?</h1>
<ul>
    <li></li>
    <li></li>
    </li></li>
    <li></li>
</ul>
    
</body>
</html>