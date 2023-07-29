<?php
session_start();

if(isset($_SESSION["user"])){
    header("Location: ../login/login.php");
}

if(!isset($_SESSION["user"]) && !isset($_SESSION["adm"])){
    header("Location: ../login/login.php");
}

require_once 'navbarAdm.php';
require_once '../db_connect.php';
require_once 'file_upload.php';

$name = $age = $size = $breed = $vaccinated = $live = $description = $image = "";

if(isset($_POST["create"])){
    $name = $_POST["name"];
    $age = $_POST["age"];
    $size = $_POST["size"];
    $breed = $_POST["breed"];
    $vaccinated = $_POST["vaccinated"];
    $live = $_POST["live"];
    $description = $_POST["description"];
    $image = fileUpload($_FILES["image"]);

    $sql ="INSERT INTO `animals`(`age`, `size`, `live`, `description`, `image`, `breed`, `vaccinated`, `name`)
    VALUES ('$age','$size','$live','$description','$image[0]','$breed','$vaccinated','$name')";

    if(mysqli_query($connect,$sql)){
        echo "<div class='alert alert-success' role='alert'>
        Item was created successfully!, {$image[1]}
    </div>";
    //    header("refresh: 3; url = index.php");
    }else{
        echo "<div class='alert alert-danger' role='alert'>
        Try again bitch!, , {$image[1]}
    </div>";
    }

}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <title>New Pet</title>
</head>
<body>
<!-- Navbar Starts -->
    <?= $navbarAdm?>
<!-- Navbar Ends -->


<!-- Main Starts -->
<div class="mycont">
       <h2>New Pet For Adoption</h2>
       <form method="POST" enctype= "multipart/form-data">

           <div class="mb-3 mt-3">
               <label for="name" class= "form-label">Name</label>
               <input  type="text" class="form-control"  aria-describedby="name" name="name">
            </div>

            <div class="mb-3 mt-3">
               <label for="age" class="form-label">Age</label>
               <input  type="number" class="form-control"  aria-describedby="age" name="age">
            </div>
            <div class="myflex">
                <div class="mb-3">
                    <label for="size" class="form-label">Size</label>
                    <div class="dropdown">        
                        <select name="size" >
                            <option value="Small">Small</option>
                            <option value="Medium">Medium</option>
                            <option value="Large">Large</option>
                        </select>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="vaccinated" class="form-label">vaccinated</label>
                    <div class="dropdown">        
                        <select name="vaccinated" >
                            <option value="vaccinated">Vaccinated</option>
                            <option value="not vaccinated">Not Vaccinated</option>
                        </select>
                    </div>
                </div>
            </div>
            

            <div class="mb-3">
                <label for="breed" class="form-label">Breed</label>
                <input type="text" class="form-control" aria-describedby="breed" name="breed">
            </div>

            

            <div class="mb-3">
                <label for="live" class="form-label">Location</label>
                <input type="text" class="form-control"    aria-describedby="live"  name="live">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control"  id="description"  aria-describedby="description"  name="description">
            </div>

            
           <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type ="file" class="form-control" aria-describedby="image"   name="image">
            </div>

    
            <button name="create" type="submit" class="btn btn-primary mt-3">Create New Pet</button>
            <a href="index.php" class="btn btn-primary mt-3">Back to home page</a>
        </form>
    </div>
<!-- Main Ends  -->





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>