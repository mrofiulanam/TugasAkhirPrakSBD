@extends('penyewa.layout')
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
        <h5 class="card-title fw-bolder mb-3">Ubah Data Penyewa</h5>
        <form method="post" action="{{ route('penyewa.update', $data->id_penyewa) }}">
            @csrf
            <div class="mb-3">
                <label for="id_penyewa" class="form-label">ID Penyewa</label>
                <input type="text" class="form-control" id="id_penyewa" name="id_penyewa" value="{{ $data->id_penyewa }}">
            </div>
            <div class="mb-3">
                <label for="nama_penyewa" class="form-label">Nama Penyewa</label>
                <input type="text" class="form-control" id="nama_penyewa" name="nama_penyewa" value="{{ $data->nama_penyewa }}">
            </div>
            <div class="mb-3">
                <label for="asal_penyewa" class="form-label">Asal Penyewa</label>
                <input type="text" class="form-control" id="asal_penyewa" name="asal_penyewa" value="{{ $data->asal_penyewa }}">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Ubah" />
            </div>
        </form>
    </div>
</div>
@stop