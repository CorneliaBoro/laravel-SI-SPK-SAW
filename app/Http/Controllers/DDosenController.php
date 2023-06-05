<?php

namespace App\Http\Controllers;

use App\Models\datadosen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class DDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = datadosen ::orderBy('nip','asc')->get();
        return view('dashboard.DataDosen.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.DataDosen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nip', $request->nip);
        Session::flash('nama', $request->nama);
        Session::flash('mk', $request->mk);
        Session::flash('lab', $request->lab);

        $request->validate([
            'nip'=>'required|unique:datadosen',
            'nama'=>'required',
            'mk'=>'required',
            'lab'=>'required',
        ],[
            'nip.required'=>'NIP Wajib diisi!',
            'nama.required'=>'Nama Wajib diisi!',
            'mk.required'=>'Mata Kuliah Wajib diisi!',
            'lab.required'=>'Lab Wajib diisi!',
        ]);

        $data=[
            'nip'=>$request->nip,
            'nama'=>$request->nama,
            'mk'=>$request->mk,
            'lab'=>$request->lab,
        ];
        datadosen::create($data);

        return redirect()->route('datadosen.index')->with('success', 'Berhasil Menambahkan Data');
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
        $data = datadosen::where('id',$id)->first();
        return view('dashboard.DataDosen.edit')->with('data', $data);
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
            'nip'=>'required',
            'nama'=>'required',
            'mk'=>'required',
            'lab'=>'required',
        ],[
            'nip.required'=>'NIP Wajib diisi!',
            'nama.required'=>'Nama Wajib diisi!',
            'mk.required'=>'Mata Kuliah Wajib diisi!',
            'lab.required'=>'Lab Wajib diisi!',
        ]);

        $data=[
            'nip'=>$request->nip,
            'nama'=>$request->nama,
            'mk'=>$request->mk,
            'lab'=>$request->lab,
        ];
        datadosen::where('id',$id)->update($data);

        return redirect()->route('datadosen.index')->with('success', 'Berhasil Edit Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        datadosen::where('id',$id)->delete();
        return redirect()->route('datadosen.index')->with('success', 'Berhasil Melakukan Delete Data');
    }

    public function reportpdf(){
        $data = datadosen::all();
        $pdf = PDF::loadview('dashboard.DataDosen.datadosen-pdf', compact('data'));
 
        return $pdf->download('data-dosen.pdf');
     }
}
