<?php 

namespace App\Http\Controllers;

use App\ThirdParties\DatosGobMx\PreciosGasolinaGobClient;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ThirdPartyController extends Controller
{

    /**
     * Endpoint to get info of api.datos.gob.mx
     * The url endpoint is external-data/{postal_code}
     * @var string $cp
     * 
     * @return JsonResponse
     */
    public function index(string $cp) : JsonResponse
    {
        $preciosGasolinaGobClient = new PreciosGasolinaGobClient;        
        return response()->json($preciosGasolinaGobClient->getInfoByCp($cp));
    }
}
