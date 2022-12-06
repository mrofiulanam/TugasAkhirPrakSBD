@extends('sewa.layout')
@section('content')
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="card mt-4">
    <div class="card-body">
        <h5 class="card-title fw-bolder mb-3">Ubah Data Sewa</h5>
        <form method="post" action="{{ route('sewa.update', $data->id_sewa) }}">
            @csrf
            <div class="mb-3">
                <label for="id_sewa" class="form-label">ID Sewa</label>
                <input type="text" class="form-control" id="id_sewa" name="id_sewa" value="{{ $data->id_sewa }}">
            </div>
            <div class="mb-3">
                <label for="id_lapangan" class="form-label">ID Lapangan</label>
                <input type="text" class="form-control" id="id_lapangan" name="id_lapangan" value="{{ $data->id_lapangan }}">
            </div>
            <div class="mb-3">
                <label for="id_penyewa" class="form-label">ID Penyewa</label>
                <input type="text" class="form-control" id="id_penyewa" name="id_penyewa" value="{{ $data->id_penyewa }}">
            </div>
            <div class="mb-3">
                <label for="tanggal_sewa" class="form-label">Tanggal Sewa</label>
                <input type="date" class="form-control" id="tanggal_sewa" name="tanggal_sewa" value="{{ $data->tanggal_sewa }}">
            </div>
            <div class="mb-3">
                <label for="jam_sewa" class="form-label">Jam Sewa</label>
                <input type="time" class="form-control" id="jam_sewa" name="jam_sewa" value="{{ $data->jam_sewa }}">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga"value="{{ $data->harga }}">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Ubah" />
            </div>
        </form>
    </div>
</div>
@stop