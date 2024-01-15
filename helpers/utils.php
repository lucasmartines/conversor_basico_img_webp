<?php

function select_witch_method_of_conversion_webp($extension){
   
    switch($extension){
        case "jpeg":
            return "imagecreatefromjpeg";
        case "jpg":
            return "imagecreatefromjpeg";
        case "png":
            return "imagecreatefrompng";
        case "gif":
            return "imagecreatefromgif";
        default:
            throw new Exception("Error extension: $extension not valid");
    }
}