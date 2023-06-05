<?php

namespace App\Http\Controllers;

use App\Models\dataalternatif;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DAlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = dataalternatif ::orderBy('kode','asc')->get();
        return view('dashboard.DataAlternatif.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataalternatif = dataalternatif::pluck('nama', 'id');
        $model = new dataalternatif();
        $kodeBaru = $model->generateKode();
        return view('dashboard.DataAlternatif.create', compact('kodeBaru','dataalternatif'));
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
        Session::flash('nim', $request->nim);
        Session::flash('nama', $request->nama);

        $request->validate([
            'kode'=>'required|unique:dataalternatif',
            'nim'=>'required|unique:dataalternatif',
            'nama'=>'required',
            
        ],[
            'kode.required'=>'kode Wajib diisi!',
            'nim.required'=>'NIM Wajib diisi!',
            'nama.required'=>'Nama Wajib diisi!',
        ]);

        $data=[
            'kode'=>$request->kode,
            'nim'=>$request->nim,
            'nama'=>$request->nama,
        ];
        dataalternatif::create($data);

        return redirect()->route('dataalternatif.index')->with('success', 'Berhasil Menambahkan Data');
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
        $data = dataalternatif::where('id',$id)->first();
        return view('dashboard.DataAlternatif.edit')->with('data', $data);
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
            'nim'=>'required',
            'nama'=>'required',
            
        ],[
            'kode.required'=>'kode Wajib diisi!',
            'nim.required'=>'NIM Wajib diisi!',
            'nama.required'=>'Nama Wajib diisi!',
        ]);

        $data=[
            'kode'=>$request->kode,
            'nim'=>$request->nim,
            'nama'=>$request->nama,
        ];
        dataalternatif::where('id',$id)->update($data);

        return redirect()->route('dataalternatif.index')->with('success', 'Berhasil Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dataalternatif::where('id',$id)->delete();
        return redirect()->route('dataalternatif.index')->with('success', 'Berhasil Melakukan Delete Data');
    }

    public function reportpdf(){
        $data = dataalternatif::all();
        $pdf = PDF::loadview('dashboard.DataAlternatif.dataalternatif-pdf', compact('data'));
 
        return $pdf->download('data-alternatif.pdf');
     }
}
