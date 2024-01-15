<?php 

namespace Lucasmartines\Webpystem; 

class WebpMyGenerator
{
    public function __construct(){
        
        if( !file_exists( ROOT_DIR . "/output")){
            mkdir(ROOT_DIR . "/output");
        }

        if( !file_exists( ROOT_DIR . "/input")){
            mkdir(ROOT_DIR . "/input");
            throw new \Exception("Input not exists");
        }

    }    


    function run(){
        
            $lista_dirs = glob(ROOT_DIR . "/input/**");

            foreach($lista_dirs as $atual)
            {
                if( is_file($atual) ){

                    /** [filename,extension] => */  extract( pathinfo($atual) );

                    $read_image_from  = select_witch_method_of_conversion_webp($extension);

                    $imagecreatefrom  = $read_image_from($atual);  

                    imagewebp($imagecreatefrom,  ROOT_DIR . "/output/$filename.webp", 100);

                    echo "imagem: $filename gerado com sucesso" . PHP_EOL;
                }
            } 
    }

}