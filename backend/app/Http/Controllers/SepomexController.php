<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Sepomex;

class SepomexController extends Controller
{

    /**
     * Endpoint to get info of sepomex or the states grouped if the group parameter has been added
     * The url endpoint is sepomex
     * @var string $id
     * 
     * @return JsonResponse
     */
    public function index(Request $request) : JsonResponse
    {
        $group = $request->input('group', null);

        switch($group) {
            case "state":
                $responseData = Sepomex::orderBy('d_estado', 'asc')
                ->groupBy('d_estado')
                ->get()
                ->toArray();
                break;

            default:
                $responseData = Sepomex::orderBy('d_codigo', 'desc')
                ->get()
                ->toArray();
                break;
        }

        return response()->json($responseData);
    }

    /**
     * Endpoint to get info of a sepomex row
     * The url endpoint is sepomex/{id}
     * @var string $id
     * 
     * @return JsonResponse
     */
    public function show($id) : JsonResponse
    {
        $sepomexRow = Sepomex::find($id);
        return response()->json($sepomexRow);
    }

    /**
     * Endpoint to get municipios by a sepomex
     * The url endpoint is sepomex/municipios/{state}
     * @var Request $request
     * @var string $state
     * 
     * @return JsonResponse
     */
    public function getMunicipios(Request $request, string $state) : JsonResponse
    {
        $estado = Sepomex::find($state)->toArray();
        $responseData = Sepomex::where('d_estado', $estado['d_estado'])
                ->orderBy('D_mnpio', 'asc')
                ->groupBy('D_mnpio')
                ->get()
                ->toArray();
        return response()->json($responseData);
    }

    /**
     * Endpoint to get postal codes by a sepomex
     * The url endpoint is sepomex/postalCodes/{municipio}
     * @var Request $request
     * @var string $municipio
     * 
     * @return JsonResponse
     */
    public function getPostalCodes(Request $request, string $municipio) : JsonResponse
    {
        $municipio = Sepomex::find($municipio)->toArray();
        $responseData = Sepomex::where('D_mnpio', $municipio['D_mnpio'])
                ->orderBy('d_codigo', 'asc')
                ->groupBy('d_codigo')
                ->get()
                ->toArray();
        return response()->json($responseData);
    }

}
