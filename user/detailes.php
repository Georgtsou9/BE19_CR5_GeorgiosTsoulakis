<?php

session_start();

if(isset($_SESSION["adm"])){
    header("Location: ../login/login.php");
}

if(!isset($_SESSION["user"]) && !isset($_SESSION["adm"])){
    header("Location: ../login/login.php");
}

require_once '../navbar.php';
require_once '../db_connect.php';

$getId = $_GET["id"];
$sql = "SELECT * FROM `animals` WHERE id= $getId";
$result = mysqli_query($connect, $sql);

$animal = "";

if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        if($row["status"]== "availiable"){
            $disable = "";
        }else{
            $disable = "disabled";
        }

        $animal .=  "
        <div class='card' style='width: 50rem;'>
        <img src='../animalPic/{$row["image"]}' style='height: 17rem;'  class='card-img-top' alt='Oops'>
        <div class='card-body'>
        <h5 class='card-title'>{$row["name"]}</h5>
        <p class='card-text'>Age: {$row["age"]} years old</p>
        <p class='card-text'>Breed: {$row["breed"]}</p>
        <p class='card-text'>Size: {$row["size"]}</p>
        <p class='card-text'>Vaccination status: {$row["vaccinated"]}</p>  
        <p class='card-text'>Location: {$row["live"]}</p>    
        <p class='card-text'>{$row["status"]}</p>
        <p class='card-text'>Description: {$row["description"]}</p>

        <a href='adoption.php?id={$row["id"]}'class='btn btn-primary $disable' style='width: 11rem;'>Adopt</a>
    </div>
    
</div>" ;
    }
} else  {
    $animal .= "<p>No results found</p>" ;
}

mysqli_close($connect);

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <title>Animal Adoption</title>
</head>
<body>
<!-- Navbar Starts -->
    <?= $navbarUser?>
<!-- Navbar Ends -->


<!-- Main Starts -->
<div class="details">
    <?= $animal ?>
</div>

<!-- Main Ends  -->



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>