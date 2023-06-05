@extends('dashboard.layout.dash-layout')


@section('header')
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-5">
            <h5>Data Kriteria</h5>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Proses SPK</li>
                <li class="breadcrumb-item active">Data Kriteria</li>
            </ol>
        </div>
    </div>
@endsection


@section('konten')
    @include('dashboard.pesan')
    <div class="pb-3"><a href="{{ route('datakriteria.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    <form action="{{ route('datakriteria.update', ['datakriterium' => $data->id])}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="kode" class="form-label">Kode</label>
            <input type="text" class="form-control form-control-sm" name="kode" id="kode" placeholder="" readonly
                value="{{ $data->kode }}">
        </div>
        <div class="mb-3">
            <label for="kriteria" class="form-label">Kriteria</label>
            <input type="text" class="form-control form-control-sm" name="kriteria" id="kriteria" placeholder=""
                value="{{ $data->kriteria}}">
        </div>
        <div class="mb-3">
            <label for="bobot" class="form-label">Bobot</label>
            <input type="number" step="0.01" class="form-control form-control-sm" name="bobot" id="bobot" placeholder=""
                value="{{ $data->bobot}}">
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
@endsection
