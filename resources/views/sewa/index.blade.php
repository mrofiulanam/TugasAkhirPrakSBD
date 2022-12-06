@extends('sewa.layout')
@section('content')
<a href="{{ route('sewa.index') }}" type="button" class="btn btn rounded-3">Data Sewa</a>
<a href="{{ route('lapangan.index') }}" type="button" class="btn btn rounded-3">Data Lapangan</a>
<a href="{{ route('penyewa.index') }}" type="button" class="btn btn rounded-3">Data Penyewa</a>
<a href="{{ route('home.index') }}" type="button" class="btn btn-danger rounded-3" style="float:right">Log Out</a>
@if($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
    {{ $message }}
</div>
@endif
<h4 class="mt-5">Data Sewa</h4>
<a href="{{ route('sewa.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>
<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>No.</th>
            <th>ID Lapangan</th>
            <th>ID Penyewa</th>
            <th>Tanggal Sewa</th>
            <th>Jam Sewa</th>
            <th>Harga</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
        <tr>
            <td>{{ $data->id_sewa }}</td>
            <td>{{ $data->id_lapangan }}</td>
            <td>{{ $data->id_penyewa }}</td>
            <td>{{ $data->tanggal_sewa }}</td>
            <td>{{ $data->jam_sewa }}</td>
            <td>{{ $data->harga }}</td>
            <td>
                <a href="{{ route('sewa.edit', $data->id_sewa) }}" type="button"
                    class="btn btn-warning rounded-3">Ubah</a>
                <!-- TAMBAHKAN KODE DELETE DI BAWAH BARIS INI -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#hapusModal{{ $data->id_sewa }}">
                    Hapus
                </button>
                <!-- Modal -->
                <div class="modal fade" id="hapusModal{{ $data->id_sewa }}" tabindex="-1"
                    aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('sewa.delete', $data->id_sewa) }}">
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