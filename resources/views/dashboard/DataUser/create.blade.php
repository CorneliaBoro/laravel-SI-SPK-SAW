@extends('dashboard.layout.dash-layout')


@section('header')
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-5">
            <h5>Tambah Data User</h5>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Data Pelaku</li>
                <li class="breadcrumb-item active">Data User</li>
            </ol>
        </div>
    </div>
@endsection


@section('konten')
    @include('dashboard.pesan')
    <div class="pb-3"><a href="{{ route('datauser.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    <form action="{{ route('datauser.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control form-control-sm" name="name" id="name" placeholder="name"
                value="{{ Session::get('name') }}">
        </div>
         <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control form-control-sm" name="username" id="username" placeholder="username"
                value="{{ Session::get('username') }}">
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
@endsection
