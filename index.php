<?php

require_once("vendor/autoload.php");

use Lucasmartines\Webpystem\WebpMyGenerator;

$x = new WebpMyGenerator( ROOT_DIR . "/input",     ROOT_DIR . "/output"   );
 
$x->run();