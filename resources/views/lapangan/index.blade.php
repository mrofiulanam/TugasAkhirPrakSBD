@extends('lapangan.layout')
@section('content')
<a href="{{ route('sewa.index') }}" type="button" class="btn btn rounded-3">Data Sewa</a>
<a href="{{ route('lapangan.index') }}" type="button" class="btn btn rounded-3">Data Lapangan</a>
<a href="{{ route('penyewa.index') }}" type="button" class="btn btn rounded-3">Data Penyewa</a>
<a href="{{ route('home.index') }}" type="button" class="btn btn-danger rounded-3" style="float:right">Log Out</a>
<div style="margin-top: 20px">
    <div style="margin-bottom: +45px">
        <div style="float:right">
            <a class="btn btn-outline-primary btn-sm" href="{{ route('lapangan.index') }}" type="button">Data Lapangan</a>
            <a class="btn btn-outline-dark btn-sm" href="{{ route('lapangan.trash') }}" type="button">Trash</a>
        </div>
    </div>
</div>
<h4 class="mt-5">Data Lapangan</h4>
<a href="{{ route('lapangan.create') }}" type="button" class="btn btn-success rounded-3">Tambah Lapangan</a>
<div class="form-search" style="float:right">
    <form action="{{ route('lapangan.search') }}" method="get" accept-charset="utf-8">
        <div class="form-group" style="display:flex">
            <input type="search" id="nama" name="nama" class="form-control" placeholder="Nama Lapangan">
            <button type="submit" class="btn btn-secondary">Search</button>
        </div>
    </form>
</div>
@if($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
    {{ $message }}
</div>
@endif
<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Lapangan</th>
            <th>Tipe Lapangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
        <tr>
            <td>{{ $data->id_lapangan }}</td>
            <td>{{ $data->nama_lapangan }}</td>
            <td>{{ $data->tipe_lapangan }}</td>
            <td>
                <a href="{{ route('lapangan.edit', $data->id_lapangan) }}" type="button"
                    class="btn btn-warning rounded-3">Ubah</a>
                <!-- TAMBAHKAN KODE DELETE DI BAWAH BARIS INI -->
                <a href="{{ route('lapangan.hide', $data->id_lapangan) }}" type="button"
                    class="btn btn-danger rounded-3">Hapus</a>
                <!-- Button trigger modal -->
                <!--<button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#hapusModal{{ $data->id_lapangan }}">
                    Hapus
                </button> -->
                <!-- Modal -->
                <div class="modal fade" id="hapusModal{{ $data->id_lapangan }}" tabindex="-1"
                    aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('lapangan.delete', $data->id_lapangan) }}">
                                @csrf
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus data ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Ya</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop