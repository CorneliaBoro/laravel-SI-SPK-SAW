@extends('dashboard.layout.dash-layout')


@section('header')
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-5">
            <h1>Data Kriteria</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Proses SPK</li>
                <li class="breadcrumb-item active">Data Kriteria</li>
            </ol>
        </div>
    </div>
@endsection

@section('tombol')
    <div class="card mx-3">
        <div class="card-body">
            <div>
                <a href="{{ route('datakriteria.create') }}" class="btn btn-primary">+ Tambah Data</a>
                <a href="\reportkriteria" rel="noopener" target="_blank" class="btn btn-secondary"><i class="fas fa-print"></i>
                    Print</a>
            </div>

        </div>
    </div>
@endsection

@section('konten')
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th class="col-1">Kode</th>
                    <th class="col-2">Kriteria</th>
                    <th class="col-2">Bobot</th>
                    <th class="col-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($data as $item)
                    <tr>
                        <td class="col-1">{{ $i }}</td>
                        <td class="col-1">{{ $item->kode }}</td>
                        <td class="col-2">{{ $item->kriteria }}</td>
                        <td class="col-2">{{ $item->bobot }}</td>
                        <td class="col-2">
                            <a href="{{ route('datakriteria.edit', ['datakriterium' => $item->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form onsubmit="return confirm('Yakin Ingin menghapus data ini?')" action=" {{ route('datakriteria.destroy', $item->id) }}"
                                class="d-inline" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit" name="submit">
                                    Del
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php $i++; ?>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
