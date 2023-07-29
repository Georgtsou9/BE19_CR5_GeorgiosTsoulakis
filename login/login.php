<?php
session_start();
require_once '../db_connect.php';



if(isset($_SESSION["adm"])){
    header("Location: ../admin/dashboard.php");
}

if(isset($_SESSION["user"])){
    header("Location: ../user/home.php");
}


$email = $passError = $emailError = "";
$error = false;

function cleanInput($param){
    $data = trim($param);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);

    return $data;
}


if(isset($_POST["login"])){
    $email = cleanInput($_POST["email"]);
    $password = $_POST["password"];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error = true ;
        $emailError = "Please enter a valid email";
    }

    if(empty($password)){
        $error = true;
        $passError = "Password can't be empty";

    }

    if(!$error){
        $password = hash("sha256", $password);

        $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($result);

        if(mysqli_num_rows($result) == 1){
            if($row["access"] == "user"){
                $_SESSION["user"] = $row["id"];
                header("Location: ../user/home.php");
            }else {
                $_SESSION["adm"] = $row["id"];
                header("Location: ../admin/dashboard.php");
            }

        }else {
            echo "<div class='alert alert-danger'>
                <p>Wrong credentials</p>
              </div>";
        }
    }
}

?>







<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" >
        <title>Login page </title>
        <link rel="stylesheet" href="../style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    </head>
    <body>
        <div class="mycont">
            <h1 class="text-center">Login page </h1>
            <form method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address </label>
                    <input type="email" class="form-control" name="email" placeholder="Email address" value="<?= $email ?>" >
                    <span class="text-danger"><?= $emailError ?></span>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" value="<?= $password ?>">
                    <span class="text-danger"><?= $passError ?></span>
                </div>
                <button name="login" type="submit" class="btn btn-primary" >Login</button>
             
                <span>you don't have an account? <a href="register.php">Register here </a></span>
            </form>
        </div>
     
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </body>
</html>