<?php

namespace App\Http\Controllers;

use App\Models\dataaslab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DAslabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = dataaslab ::orderBy('nim','asc')->get();
        return view('dashboard.DataAslab.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.DataAslab.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nim', $request->nim);
        Session::flash('nama', $request->nama);
        Session::flash('jenis_kelamin', $request->input('jk'));
        Session::flash('ipk', $request->ipk);

        $request->validate([
            'nim'=>'required|unique:dataaslab',
            'nama'=>'required',
            'jk'=>'required',
            'ipk'=>'required',
        ],[
            'nim.required'=>'NIM Wajib diisi!',
            'nama.required'=>'Nama Wajib diisi!',
            'jk.required'=>'Jenis Kelamin Wajib diisi!',
            'ipk.required'=>'IPK Wajib diisi!',
        ]);

        $data=[
            'nim'=>$request->nim,
            'nama'=>$request->nama,
            'jenis_kelamin'=>$request->input('jk'),
            'ipk'=>$request->ipk,
        ];
        dataaslab::create($data);

        return redirect()->route('dataaslab.index')->with('success', 'Berhasil Menambahkan Data');

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
        $data = dataaslab::where('id',$id)->first();
        return view('dashboard.DataAslab.edit')->with('data', $data);
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
            'nim'=>'required',
            'nama'=>'required',
            'jk'=>'required',
            'ipk'=>'required',
        ],[
            'nim.required'=>'NIM Wajib diisi!',
            'nama.required'=>'Nama Wajib diisi!',
            'jk.required'=>'Jenis Kelamin Wajib diisi!',
            'ipk.required'=>'IPK Wajib diisi!',
        ]);

        $data=[
            'nim'=>$request->nim,
            'nama'=>$request->nama,
            'jenis_kelamin'=>$request->jk,
            'ipk'=>$request->ipk,
        ];
        dataaslab::where('id',$id)->update($data);

        return redirect()->route('dataaslab.index')->with('success', 'Berhasil Melakukan Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dataaslab::where('id',$id)->delete();
        return redirect()->route('dataaslab.index')->with('success', 'Berhasil Melakukan Delete Data');
    }

    public function reportpdf(){
       $data = dataaslab::all();
       $pdf = PDF::loadview('dashboard.DataAslab.dataaslab-pdf', compact('data'));

       return $pdf->download('data-aslab.pdf');
    }
}
