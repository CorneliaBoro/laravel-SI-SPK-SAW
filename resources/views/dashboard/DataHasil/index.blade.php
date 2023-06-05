@extends('dashboard.layout.dash-layout')

@section('header')
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-5">
            <h1>Data Hasil Keputusan</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Proses SPK</li>
                <li class="breadcrumb-item active">Hasil Keputusan</li>
            </ol>
        </div>
    </div>
@endsection

@section('tombol')
    <div class="card mx-3">
        <div class="card-body">
            <div>
                <a href="/reporthasil" rel="noopener" target="_blank" class="btn btn-secondary"><i class="fas fa-print"></i>
                    Print</a>
            </div>
        </div>
    </div>
@endsection

@section('konten')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama </th>
                <th>NIM</th>
                <th>Skor</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Cornelia</td>
                <td>2218060</td>
                <td>1</td>
            </tr>
            <tr>
                <td>Kevin</td>
                <td>2218061</td>
                <td>0.68</td>
            </tr>
        </tbody>
    </table>
@endsection
