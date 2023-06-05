<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\datapraktikum;
use Illuminate\Support\Facades\Session;

class DPrakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = datapraktikum ::orderBy('namaprak','asc')->get();
        return view('dashboard.DataPrak.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.DataPrak.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('namaprak', $request->namaprak);
        Session::flash('semester', $request->input('semester'));
        Session::flash('dosen', $request->dosen);

        $request->validate([
            'namaprak'=>'required',
            'semester'=>'required',
            'dosen'=>'required',
        ],[
            'namaprak.required'=>'Nama Praktikum Wajib diisi!',
            'semester.required'=>'Semester Wajib diisi!',
            'dosen.required'=>'dosen Wajib diisi!',
        ]);

        $data=[
            'namaprak'=>$request->namaprak,
            'dosen'=>$request->dosen,
            'semester'=>$request->input('semester'),
        ];
        datapraktikum::create($data);

        return redirect()->route('dataprak.index')->with('success', 'Berhasil Menambahkan Data');
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
        $data = datapraktikum::where('id',$id)->first();
        return view('dashboard.DataPrak.edit')->with('data', $data);
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
            'namaprak'=>'required',
            'semester'=>'required',
            'dosen'=>'required',
        ],[
            'namaprak.required'=>'Nama Praktikum Wajib diisi!',
            'semester.required'=>'Semester Wajib diisi!',
            'dosen.required'=>'dosen Wajib diisi!',
        ]);

        $data=[
            'namaprak'=>$request->namaprak,
            'dosen'=>$request->dosen,
            'semester'=>$request->input('semester'),
        ];
        datapraktikum::where('id',$id)->update($data);

        return redirect()->route('dataprak.index')->with('success', 'Berhasil Menambahkan Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        datapraktikum::where('id',$id)->delete();
        return redirect()->route('dataprak.index')->with('success', 'Berhasil Melakukan Delete Data');
    }
}
