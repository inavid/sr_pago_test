<?php

use Illuminate\Http\Request;

#Endpoints to get information of sepomex
Route::get('sepomex', 'SepomexController@index');
Route::get('sepomex/municipios/{state}', 'SepomexController@getMunicipios');
Route::get('sepomex/postalCodes/{municipio}', 'SepomexController@getPostalCodes');
Route::get('sepomex/{id}', 'SepomexController@show');

#Endpoint to get the information of the datos.gob.api 
Route::get('external-data/{cp}', 'ThirdPartyController@index');
