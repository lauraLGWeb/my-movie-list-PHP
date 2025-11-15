<?php
$serveurName ='localhost';
$id = "root";
$password="root";
try {
$conn= new PDO("mysql:host=$serveurName;dbname=tp_netflixx_LEGALL_LAURA", $id,$password);
} catch (PDOExeption $e){
    echo "erreur" .$e->getMessage();
}
