<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Peta extends Model
{
    public $incrementing = false;
    protected $table = 'indonesia_kab';
    protected $fillable = [
        'OGR_FID', 'id', 'kabupaten', 'provinsi', 'jml_hilang', 'SHAPE'
    ];
    protected $spatialFields = [
        'SHAPE',
    ];

    protected static function getGeoJSON()
    {
        $data_mentah = DB::table('indonesia_kab')
            ->select(DB::raw('provinsi , kabupaten_ AS kabupaten , jml_hilang , ST_AsGeoJSON(SHAPE) AS geometry'))
            ->where('provinsi', '=', ['Jawa Timur'])
            ->orderBy('kabupaten', 'ASC')
            ->get();

        $hasil = array();

        foreach ($data_mentah as $value) {
            $geo = json_decode($value->geometry);
            array_push($hasil, [
                "type" => "Feature",
                "properties" => [
                    "nama_kabupaten" => $value->kabupaten,
                    "provinsi" => $value->provinsi,
                    "banyak_uang_hilang" => $value->jml_hilang,
                ],
                "geometry" => [
                    "type" => $geo->type,
                    "coordinates" => $geo->coordinates,
                ],
            ]);
        }

        return array("type" => "FeatureCollection", "features" => $hasil);
    }
}
