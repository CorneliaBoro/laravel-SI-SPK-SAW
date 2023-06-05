<?php

namespace App\Http\Controllers;

use App\Models\datakriteria;
use Illuminate\Http\Request;
use App\Models\datasubkriteria;
use Illuminate\Support\Facades\Session;

class DSubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = datasubkriteria :: all();
        $kriteria = datakriteria::all();
        return view('dashboard.DataSub.index',['kriteria' => $kriteria], ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kriteria = datakriteria::all(); // Mengambil semua data kriteria
        return view('dashboard.DataSub.create', ['kriteria' => $kriteria]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('namasub', $request->namasub);
        Session::flash('bobot', $request->bobot);

        $request->validate([
            'id_kriteria'=>'required',
            'namasub'=>'required',
            'bobot'=>'required',

        ],[
            'namasub.required'=>'Nama Wajib diisi!',
            'bobot.required'=>'Bobot Wajib diisi!',
        ]);

        $data=[
            'id_kriteria'=>$request->id_kriteria,
            'namasub'=>$request->namasub,
            'bobot'=>$request->bobot,
        ];
        datasubkriteria::create($data);

        return redirect()->route('dashboard.DataSub.index')->with('success', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kriteria = datakriteria::findOrFail($id);
        return view('dashboard.DataSub.index', compact('kriteria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
