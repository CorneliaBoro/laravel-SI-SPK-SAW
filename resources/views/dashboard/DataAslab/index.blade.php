@extends('dashboard.layout.dash-layout')


@section('header')
    <div class="row mb-2 mx-2 justify-content-between">
        <div class="col-sm-5">
            <h1>Data Asisten Laboratorium</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Data Pelaku</li>
                <li class="breadcrumb-item active">Data Aslab</li>
            </ol>
        </div>
    </div>
@endsection

@section('tombol')
    <div class="card mx-3">
        <div class="card-body">
            <div>
                <a href="{{ route('dataaslab.create') }}" class="btn btn-primary">+ Tambah Data</a>
                <a href="\reportaslab" rel="noopener" target="_blank" class="btn btn-secondary"><i class="fas fa-print"></i>
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
                    <th class="col-2">NIM</th>
                    <th class="col-2">Nama</th>
                    <th class="col-2">Jenis Kelamin</th>
                    <th class="col-2">IPK</th>
                    <th class="col-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($data as $item)
                    <tr>
                        <td class="col-1">{{ $i }}</td>
                        <td class="col-2">{{ $item->nim }}</td>
                        <td class="col-2">{{ $item->nama }}</td>
                        <td class="col-2">{{ $item->jenis_kelamin }}</td>
                        <td class="col-2">{{ $item->ipk }}</td>
                        <td class="col-2">
                            <a href="{{ route('dataaslab.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form onsubmit="return confirm('Yakin Ingin menghapus data ini?')" action=" {{ route('dataaslab.destroy', $item->id) }}"
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
