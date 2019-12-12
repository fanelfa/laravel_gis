<?php

namespace App\Http\Controllers;

use App\Models\Peta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('petamapbox');
    }

    public function getDataGeoJSON()
    {
        $dataGeo = Peta::getGeoJSON();

        return $dataGeo;
    }
}
