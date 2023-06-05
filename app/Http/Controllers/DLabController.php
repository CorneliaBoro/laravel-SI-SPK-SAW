<?php

namespace App\Http\Controllers;

use App\Models\datalab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DLabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = datalab ::orderBy('semester','asc')->get();
        return view('dashboard.DataLab.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.DataLab.create');
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

        $request->validate([
            'namaprak'=>'required',
            'semester'=>'required',
        ],[
            'namaprak.required'=>'Nama Praktikum Wajib diisi!',
            'semester.required'=>'Semester Wajib diisi!',
        ]);

        $data=[
            'namaprak'=>$request->namaprak,
            'semester'=>$request->input('semester'),
        ];
        datalab::create($data);

        return redirect()->route('datalab.index')->with('success', 'Berhasil Menambahkan Data');
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
        $data = datalab::where('id',$id)->first();
        return view('dashboard.DataLab.edit')->with('data', $data);
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
        ],[
            'namaprak.required'=>'Nama Praktikum Wajib diisi!',
            'semester.required'=>'Semester Wajib diisi!',
        ]);

        $data=[
            'namaprak'=>$request->namaprak,
            'semester'=>$request->input('semester'),
        ];
        datalab::where('id',$id)->update($data);

        return redirect()->route('datalab.index')->with('success', 'Berhasil Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        datalab::where('id',$id)->delete();
        return redirect()->route('datalab.index')->with('success', 'Berhasil Melakukan Delete Data');
    }
}
