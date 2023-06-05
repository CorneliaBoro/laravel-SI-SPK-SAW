@extends('dashboard.layout.dash-layout')


@section('header')
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-5">
            <h5>Data Dosen</h5>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Data Pelaku</li>
                <li class="breadcrumb-item active">Data Dosen</li>
            </ol>
        </div>
    </div>
@endsection

@section('konten')
    @include('dashboard.pesan')
    <div class="pb-3"><a href="{{ route('datadosen.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    <form action="{{ route('datadosen.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="text" class="form-control form-control-sm" name="nip" id="nip" placeholder=""
                value="{{ $data->nip }}">
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control form-control-sm" name="nama" id="nama" placeholder=""
                value="{{ $data->nama }}">
        </div>
        <div class="mb-3">
            <label for="mk" class="form-label">Nama MK</label>
            <input type="text" class="form-control form-control-sm" name="mk" id="mk" placeholder=""
                value="{{ $data->mk }}">
        </div>
        <div class="mb-3">
            <label for="lab" class="form-label">Nama Lab</label>
            <input type="text" class="form-control form-control-sm" name="lab" id="ab" placeholder=""
                value="{{ $data->lab }}">
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
@endsection
