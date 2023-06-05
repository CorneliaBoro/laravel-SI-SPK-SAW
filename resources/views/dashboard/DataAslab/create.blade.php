@extends('dashboard.layout.dash-layout')


@section('header')
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-5">
            <h5>Tambah Data Asisten Laboratorium</h5>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Data Pelaku</li>
                <li class="breadcrumb-item active">Data Aslab</li>
            </ol>
        </div>
    </div>
@endsection


@section('konten')
    @include('dashboard.pesan')
    <div class="pb-3"><a href="{{ route('dataaslab.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    <form action="{{ route('dataaslab.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" class="form-control form-control-sm" name="nim" id="nim" placeholder="NIM"
                value="{{ Session::get('nim') }}">
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control form-control-sm" name="nama" id="nama" placeholder="Nama"
                value="{{ Session::get('nama') }}">
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;"
                name="jk">
              <option selected="selected">Laki-laki</option>
              <option>Perempuan</option>
            </select>
          </div>
        <div class="mb-3">
            <label for="ipk" class="form-label">IPK</label>
            <input type="text" class="form-control form-control-sm" name="ipk" id="ipk" placeholder="IPK"
                value="{{ Session::get('ipk') }}">
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
@endsection
