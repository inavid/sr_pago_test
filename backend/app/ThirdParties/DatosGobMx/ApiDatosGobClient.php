<?php

namespace App\ThirdParties\DatosGobMx;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

/**
 * Class ApiDatosGobClient
 * Abstract class that should be inherited by every class that is gonna
 * consume the api.datos.gob api 
 * 
 * @package App\ThirdParties\DatosGobMx
 */
abstract class ApiDatosGobClient 
{
    protected $guzzleClient;

    protected function __construct() {
        $this->guzzleClient = new Client();
    }
    
}
