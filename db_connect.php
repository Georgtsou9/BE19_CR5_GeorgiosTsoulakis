<?php
$hostname = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "be19_cr5_animal_adoption_georgiostsoulakis";

$connect = mysqli_connect($hostname, $username, $password, $dbname);




if(!$connect) {
   die( "Connection failed: " . mysqli_connect_error() );
}
?>