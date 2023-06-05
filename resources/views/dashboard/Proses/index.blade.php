@extends('dashboard.layout.dash-layout')

@section('header')
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-5">
        <h1>Proses Perhitungan</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Proses SPK</li>
            <li class="breadcrumb-item active">Proses Perhitungan</li>
        </ol>
        </div>
    </div>
@endsection


@section('konten')

<div class="table-responsive">
       <p style="font-size: 18px;"><b>1. Hitung Normalisasi</b></p>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 10px">No</th>
              <th>Alternatif</th>
              <th>Kriteria</th>
              <th>Nilai</th>
              <th>Bobot</th>
              <th>Hasil Normalisasi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            @foreach ($dataSAW as $data)
            <tr>
              <td>{{ $i }}</td>
              <td>{{$data['id_alternatif']  }}</td>
              <td>{{$data['kriteria_id']  }}</td>
              <td>{{$data['nilai_kategori']  }}</td>
              <td>{{$data['bobot_kriteria']  }}</td>
              <td>{{$data['hasil_normalisasi']  }}</td>
            </tr>
            <?php $i++; ?>
            @endforeach
          </tbody>
        </table>

        <p style="font-size: 18px;"><b>2. Hitung Preferensi</b></p>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 10px">No</th>
              <th>Alternatif</th>
              <th>Normalisasi</th>
              <th>Bobot Kriteria</th>
              <th>Preferensi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            @foreach ($dataSAW as $data)
            <tr>
              <td>{{ $i }}</td>
              <td>{{$data['id_alternatif']  }}</td>
              <td>{{$data['hasil_normalisasi']  }}</td>
              <td>{{$data['bobot_kriteria']  }}</td>
              <td>{{$data['hasil_saw']  }}</td>
            </tr>
            <?php $i++; ?>
            @endforeach
          </tbody>
        </table>

        <p style="font-size: 18px;"><b>3. Hasil Akhir</b></p>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 10px">No</th>
              <th>Id Alternatif</th>
              <th>Nilai Preferensi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <tr>
              <td>1</td>
              <td>1</td>
              <td>1</td>
            </tr>
            <tr>
              <td>2</td>
              <td>3</td>
              <td>0.68</td>
            </tr>
            <?php $i++; ?>

          </tbody>
        </table>
        
@endsection