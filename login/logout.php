<?php
    session_start();
    if(isset($_GET["logout"])){
        unset($_SESSION["user"]);
        unset($_SESSION["adm"]);

        // session_unset();
        // session_destroy(); Alternatives 

        header("Location: login.php");
    }
