<?php

namespace App\ThirdParties\DatosGobMx;

/**
 * Class PreciosGasolinaGobClient
 * Class as client to get info from api.datos.gob.mx/v2/precio.gasolina.publico
 * 
 * @package App\ThirdParties\DatosGobMx
 */
class PreciosGasolinaGobClient extends ApiDatosGobClient 
{
    private $baseUrl;

    function __construct() {
        parent::__construct();
        $this->baseUrl = "https://api.datos.gob.mx/v2/precio.gasolina.publico";
    }

    /**
     * Endpoint to get info of gasolina prices using CP as filter
     * @var string $cp
     * 
     * @return JsonResponse
     */
    public function getInfoByCp(string $cp) : array
    {
        $response = $this->guzzleClient->get(
            $this->baseUrl."?pageSize=100&codigopostal=".$cp
        );

        $response_body = json_decode($response->getBody()->getContents());

        $result = [
            "success" => false,
            "results" => $response_body->results
        ];

        if(count($response_body->results) > 0) {
            $result["success"] = true;
        }

        return $result;
    }

}
