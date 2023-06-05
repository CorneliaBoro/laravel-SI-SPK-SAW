@extends('dashboard.layout.dash-layout')


@section('header')
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-5">
        <h5>Tambah Data Alternatif</h5>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Proses SPK</li>
            <li class="breadcrumb-item active">Data Alternatif</li>
        </ol>
        </div>
    </div>
@endsection


@section('konten')
        @include('dashboard.pesan')
    <div class="pb-3"><a href="{{ route('dataalternatif.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    <form action="{{ route('dataalternatif.store') }}" method="POST"> 
        @csrf
        <div class="mb-3">
          <label for="kode" class="form-label">Kode</label>
          <input type="text"
            class="form-control form-control-sm" name="kode" id="kode"  readonly value="{{  $kodeBaru }}">
        </div>
        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text"
              class="form-control form-control-sm" name="nim" id="nim" placeholder="" required
              value="{{ Session::get('nim') }}">
          </div>
          <div class="mb-3">
            <label for="nama" class="form-label">NAMA</label>
            <input type="text"
              class="form-control form-control-sm" name="nama" id="nama"  placeholder="" required
               value="{{ Session::get('nama') }}">
             
          </div>
          <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
@endsection