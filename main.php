<?php

$lista_dirs = glob(__DIR__ . "/input/**");


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


foreach($lista_dirs as $atual)
{
    if( is_file($atual) ){

        /** [filename,extension] => */  extract( pathinfo($atual) );

        $read_image_from  = select_witch_method_of_conversion_webp($extension);

        $imagecreatefrom  = $read_image_from($atual);  

        imagewebp($imagecreatefrom,  __DIR__ . "/output/$filename.webp", 100);

        echo "imagem: $filename gerado com sucesso" . PHP_EOL;
    }
}