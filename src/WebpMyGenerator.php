<?php 
/**
* Developer Lucas Martines
*/

namespace Lucasmartines\Webpystem; 



/**
 * Method that generate webp from input to output, it supports png, jpg, jpeg, gif
 */
class WebpMyGenerator
{
    /** configure input and output directory */

    private $input , $output;


    public function __construct(  $input , $output  ){
        
        $this ->input  = $input;
        $this ->output = $output;


        if( !file_exists( $input )){
            mkdir( $input );
        }

        if( !file_exists( $output )){
            mkdir($output);
            throw new \Exception("Input not exists");
        }

    }    
    


    /* fetch from input directory for images then save into output  */
    function run(){
        
            $lista_dirs = glob($this->input . '/**');

            foreach($lista_dirs as $atual)
            {
                if( is_file($atual) ){

                    /** [filename,extension] => */  extract( pathinfo($atual) );

                    $read_image_from  = select_witch_method_of_conversion_webp($extension);

                    $imagecreatefrom  = $read_image_from($atual);  

                    imagewebp($imagecreatefrom,  $this->output . "/$filename.webp", IMAGE_QUALITY );

                    echo "imagem: $filename gerado com sucesso" . PHP_EOL;
                }
            } 
    }

}