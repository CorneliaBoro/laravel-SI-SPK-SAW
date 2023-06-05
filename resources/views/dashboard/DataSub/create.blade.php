@extends('dashboard.layout.dash-layout')

@section('header')
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-5">
            <h5>Tambah Data Sub Kriteria </h5>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Proses SPK</li>
                <li class="breadcrumb-item active">Data Sub Kriteria</li>
            </ol>
        </div>
    </div>
@endsection

@section('konten')
    @include('dashboard.pesan')
    <div class="pb-3">
        <a href="{{ route('datasub.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <form action="{{ route('datasub.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <div class="col-sm-12">
                <select name="kriteria_id" class="form-control">
                  <option class="disable" value="">---Pilih  Kriteria---</option>
                  @foreach($kriteria as $data)
                  <option value= "{{ $data->id }}" >{{ $data->kriteria }}</option>
                    @endforeach
                </select>
            </div>
          </div>
        <div class="mb-3">
            <label for="namasub" class="form-label">Nama Sub Kriteria</label>
            <input type="text" class="form-control form-control-sm" name="namasub" id="namasub" placeholder=""
                value="">
        </div>
        <div class="mb-3">
            <label for="bobot" class="form-label">Bobot</label>
            <input type="number" class="form-control form-control-sm" name="bobot" id="bobot" placeholder=""
                value="">
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>    
    </form>
@endsection
