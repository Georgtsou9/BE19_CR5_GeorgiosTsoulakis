<?php

    function fileUpload($pic){
        if($pic["error"] == 4){
            $pictureName = "default.png";
            $message = "No picture has beeen chosen";
        }else{
            $checkIfImg = getimagesize($pic["tmp_name"]);
            $message = $checkIfImg ? "OK" : "Not an Image";
        }

        if($message == "OK"){
            $ext = strtolower(pathinfo($pic["name"], PATHINFO_EXTENSION));
            $pictureName = uniqid(""). "." . $ext;

            $destination = "images/{$pictureName}";
            move_uploaded_file($pic["tmp_name"], $destination);

        }

        return [$pictureName, $message];
    }


?>