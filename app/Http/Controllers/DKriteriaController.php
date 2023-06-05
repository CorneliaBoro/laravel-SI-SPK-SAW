<?php

namespace App\Http\Controllers;

use App\Models\datakriteria;
use App\Models\datasubkriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class DKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = datakriteria ::orderBy('kode','asc')->get();
        return view('dashboard.DataKriteria.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new datakriteria();
        $kodeBaru = $model->generateKode();
        return view('dashboard.DataKriteria.create', compact('kodeBaru'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('kode', $request->kode);
        Session::flash('kriteria', $request->kriteria);
        Session::flash('bobot', $request->bobot);

        $request->validate([
            'kode'=>'required|unique:datakriteria',
            'kriteria'=>'required',
            'bobot'=>'required',
            
        ],[
            'kode.required'=>'kode Wajib diisi!',
            'kriteria.required'=>'Kriteria Wajib diisi!',
            'bobot.required'=>'Bobot Wajib diisi!',
        ]);

        $data=[
            'kode'=>$request->kode,
            'kriteria'=>$request->kriteria,
            'bobot'=>$request->bobot,
        ];    
        datakriteria::create($data);
        return redirect()->route('datakriteria.index')->with('success', 'Berhasil Menambahkan Data');
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
        $data = datakriteria::where('id',$id)->first();
        return view('dashboard.DataKriteria.edit')->with('data', $data);
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
            'kode'=>'required',
            'kriteria'=>'required',
            'bobot'=>'required',
            
        ],[
            'kode.required'=>'kode Wajib diisi!',
            'kriteria.required'=>'Kriteria Wajib diisi!',
            'bobot.required'=>'Bobot Wajib diisi!',
        ]);

        $data=[
            'kode'=>$request->kode,
            'kriteria'=>$request->kriteria,
            'bobot'=>$request->bobot,
        ];
        datakriteria::where('id',$id)->update($data);

        return redirect()->route('datakriteria.index')->with('success', 'Berhasil Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        datakriteria::where('id',$id)->delete();
        return redirect()->route('datakriteria.index')->with('success', 'Berhasil Melakukan Delete Data');
    }

    public function reportpdf(){
        $data = datakriteria::all();
        $pdf = PDF::loadview('dashboard.DataKriteria.datakriteria-pdf', compact('data'));
 
        return $pdf->download('data-kriteria.pdf');
     }
}
