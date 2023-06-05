@extends('dashboard.layout.dash-layout')


@section('header')
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-5">
            <h5>Data Laboratorium</h5>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Data Pelaku</li>
                <li class="breadcrumb-item active">Data Laboratorium</li>
            </ol>
        </div>
    </div>
@endsection

@section('konten')
    @include('dashboard.pesan')
    <div class="pb-3"><a href="{{ route('datalab.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    <form action="{{ route('datalab.update', $data->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="namaprak" class="form-label">Nama Praktikum</label>
            <input type="text" class="form-control form-control-sm" name="namaprak" id="namaprak" placeholder=""
                value="{{ $data->namaprak }}">
        </div>
        <div class="form-group">
            <label>Semester</label>
            <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;"
                name="semester">
              <option selected="selected">Pilih Semester</option>
              <option>Ganjil</option>
              <option>Genap</option>
            </select>
          </div>
        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
@endsection
