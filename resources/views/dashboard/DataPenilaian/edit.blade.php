@extends('dashboard.layout.dash-layout')

@section('header')
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-5">
            <h5>Penilaian Alternatif</h5>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Proses SPK</li>
                <li class="breadcrumb-item active">Data Penilaian</li>
            </ol>
        </div>
    </div>
@endsection

@section('konten')
    @include('dashboard.pesan')
    <div class="pb-3">
        <a href="{{ route('datapenilaian.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <form action="{{ route('datapenilaian.update', $data->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="col-12 col-sm-6">

            <div class="form-group">
                <label>Data Alternatif</label>
                <div class="col-sm-12">
                    <select name="id_alternatif" class="form-control">
                        <option class="disable" value="">---Pilih Alternatif---</option>
                        @foreach ($alternatif as $data)
                            <option value="{{ $data->id }}">{{ $data->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Penilaian Kriteria</label>
                <div class="border"></div>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>Kriteria</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td class="col-2">
                                        <div class="col-sm-12">
                                            <select name="id_kriteria" class="form-control">
                                                <option class="disable" value="">---Pilih Kriteria---</option>
                                                @foreach ($kriteria as $data)
                                                    <option value="{{ $data->id }}">{{ $data->kriteria }}</option>
                                                @endforeach
                                            </select>
                                        </div></td>
                                    <td class="col-2">
                                        <select class="form-control" name="nilai">
                                            <option value="">--- Pilih Nilai ---</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
@endsection
