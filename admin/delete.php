<?php
require_once '../db_connect.php';

$sql = "SELECT * FROM `animals` WHERE id= $_GET[id]";
$result = mysqli_query($connect,$sql);
$row =mysqli_fetch_assoc($result);

if($row["image"] != "defaultPet.png"){
    unlink("../animalPic/$row[image]");
}

$delete = "DELETE FROM `animals` WHERE id= $_GET[id]";

if(mysqli_query($connect,$delete)){
    header("Location: dashboard.php");
}else{
    echo "error";
}




?>