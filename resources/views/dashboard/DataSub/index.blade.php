@extends('dashboard.layout.dash-layout')


@section('header')
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-5">
            <h1>Data Sub Kriteria</h1>
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

@foreach($kriteria as $data)
<div class="container-fluid">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">{{ $data->kriteria }}</h3>
            <a href="{{ route('datasub.create') }}" class="btn btn-secondary float-right" >+ Tambah Data</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th bgcolor="#FFD93D" style="width: 10px">No</th>
                  <th bgcolor="#FFD93D" >Nama Sub</th>
                  <th bgcolor="#FFD93D" >Nilai</th>
                  <th bgcolor="#FFD93D" >Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1.</td>
                  <td>Sangat Baik</td>
                  <td>10</td>
                  <td><a href="#" class="btn btn-sm btn-warning">Edit</a>
                    <a href="" class="btn btn-sm btn-danger">Del</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endforeach
@endsection
