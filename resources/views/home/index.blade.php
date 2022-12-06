@extends('home.layout')
@section('content')
<a href="{{ route('login.create') }}" type="button" class="btn btn rounded-3">Login</a>
<h4 class="mt-5">Data Sewa</h4>
<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>No. Sewa</th>
            <th>Nama Lapangan</th>
            <th>Nama Penyewa</th>
            <th>Tanggal Sewa</th>
            <th>Jam Sewa</th>
            <th>Harga</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
        <tr>
            <td>{{ $data->id_sewa }}</td>
            <td>{{ $data->nama_lapangan }}</td>
            <td>{{ $data->nama_penyewa }}</td>
            <td>{{ $data->tanggal_sewa }}</td>
            <td>{{ $data->jam_sewa }}</td>
            <td>{{ $data->harga }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop