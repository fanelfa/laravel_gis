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

        // $data_mentah = DB::table('indonesia_kab')
        //     ->select(DB::raw('provinsi , kabupaten_ AS kabupaten , jml_hilang , ST_AsGeoJSON(SHAPE) AS geometry'))
        //     ->where('provinsi', '=', ['Jawa Timur'])
        //     ->first();

        // dd(json_decode($data_mentah->geometry)->coordinates);

    }
}
