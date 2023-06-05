<?php

namespace App\Http\Controllers;

use App\Models\datakriteria;
use Illuminate\Http\Request;
use App\Models\datapenilaian;
use App\Models\dataalternatif;
use App\Models\datasubkriteria;
use PDF;
use Illuminate\Support\Facades\Session;

class DPenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteria = datakriteria::all(); 
        $alternatif = dataalternatif::all();
        $data = datapenilaian::with('kriteria','alternatif')->get();
        return view('dashboard.DataPenilaian.index', compact('data','alternatif','kriteria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kriteria = datakriteria::all(); 
        $alternatif = dataalternatif::all();
        return view('dashboard.DataPenilaian.create', 
            ['kriteria' => $kriteria,
             'alternatif' => $alternatif,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('id_alternatif', $request->input('id_alternatif'));
        Session::flash('id_kriteria', $request->input('id_kriteria'));
        Session::flash('nilai', $request->input('nilai'));

        $request->validate([
            'id_alternatif'=>'required',
            'id_kriteria'=>'required',
            'nilai'=>'required'
        ]);

        $data=[
            'id_alternatif'=>$request->input('id_alternatif'),
            'id_kriteria'=>$request->input('id_kriteria'),
            'nilai'=>$request->input('nilai'),
        ];
        $alternatif = dataalternatif::all();
        $kriteria = datakriteria::all();
        datapenilaian::create($data);

        return redirect()->route('datapenilaian.index', 
        compact('alternatif','kriteria'))->with('success', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = datapenilaian::where('id',$id)->first();
        return view('dashboard.DataPenilaian.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_alternatif'=>'required',
            'id_kriteria'=>'required|array',
            'nilai'=>'required|array'
        ]);

        $penilaian = datapenilaian::findOrFail($id);

        $penilaian->id_alternatif = $request->input('id_alternatif');
        $penilaian->save();
    
        // Update data penilaian kriteria
        $penilaian->datakriteria()->sync([]);
    
        foreach ($request->input('id_kriteria') as $index => $idKriteria) {
            $nilaiKriteria = $request->input('nilai')[$index];
            $penilaian->datakriteria()->attach($idKriteria, ['nilai' => $nilaiKriteria]);
        }

        return redirect()->route('datapenilaian.index', 
        compact('alternatif','kriteria'))->with('success', 'Berhasil Menambahkan Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        datapenilaian::where('id',$id)->delete();
        return redirect()->route('datapenilaian.index')->with('success', 'Berhasil Melakukan Delete Data');
    }

    public function reportpdf(){
        $data = datapenilaian::all();
        $pdf = PDF::loadview('dashboard.DataPenilaian.penilaian-pdf', compact('data'));
 
        return $pdf->download('data-penilaian.pdf');
     }
}
