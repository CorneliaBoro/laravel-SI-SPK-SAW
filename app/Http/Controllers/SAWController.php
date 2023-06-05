<?php

namespace App\Http\Controllers;

use App\Models\dataalternatif;
use App\Models\datakriteria;
use App\Models\datapenilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SAWController extends Controller
{

    public function index()
    {
        $nilai = datapenilaian::all();
        $dataSAW = [];
        foreach ($nilai as $nilais) {
            if ($nilais) {
                foreach ($nilais->normalisasi() as $dt) {
                    $dataSAW[] = $dt;
                }
            }
        }
      
        return view('dashboard.Proses.index', compact('nilai', 'dataSAW',));
    }
}
