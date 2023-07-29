<?php
session_start();

if(isset($_SESSION["adm"])){
  header("Location: ../login/login.php");
}

if(!isset($_SESSION["user"]) && !isset($_SESSION["adm"])){
  header("Location: ../login/login.php");
}

require_once '../db_connect.php';
require_once '../navbar.php';

$userID = $_SESSION['user'];
$petId = $_GET["id"];


if(isset($_POST["adopt"])){
    $sql= "INSERT INTO `adoption`(`id_user`,`id_pet`) VALUES ('$userID','$petId')";
    $result =mysqli_query($connect, $sql);

    $update = "UPDATE `animals` SET `status`='not availiable' WHERE id= $petId";
    $resultUpdate = mysqli_query($connect, $update);

    header("refresh: 3; url = home.php");

    echo "<div class='alert alert-success'>Adoption was successfull!</div";
}



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>
<body>

 <!-- Navbar Starts -->
  <?php echo $navbarUser ?>
    
  <!-- Navbar Ends -->

<div class="adoptconfirm">
  <p>Are you sure for the adoption? <br>Click the button below!</p>
  
  <form method="post">
  <button name="adopt" type="submit" class="btn btn-primary" >Adopt</button>
</form>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>