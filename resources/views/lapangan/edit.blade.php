@extends('lapangan.layout')
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
        <h5 class="card-title fw-bolder mb-3">Ubah Data Lapangan</h5>
        <form method="post" action="{{ route('lapangan.update', $data->id_lapangan) }}">
            @csrf
            <div class="mb-3">
                <label for="id_lapangan" class="form-label">ID Lapangan</label>
                <input type="text" class="form-control" id="id_lapangan" name="id_lapangan" value="{{ $data->id_lapangan }}">
            </div>
            <div class="mb-3">
                <label for="nama_lapangan" class="form-label">Nama Lapangan</label>
                <input type="text" class="form-control" id="nama_lapangan" name="nama_lapangan" value="{{ $data->nama_lapangan }}">
            </div>
            <div class="mb-3">
                <label for="tipe_lapangan" class="form-label">Tipe Lapangan</label>
                <input type="text" class="form-control" id="tipe_lapangan" name="tipe_lapangan" value="{{ $data->tipe_lapangan }}">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Ubah" />
            </div>
        </form>
    </div>
</div>
@stop