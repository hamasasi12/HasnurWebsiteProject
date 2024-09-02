@extends('master')

@section('content')

@section('main')
<h4>Edit Kursus: <span class="text-primary">{{ $kursus->judul }}</span></h4>

<div class="card shadow mb-4">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Form Edit Kursus</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('kursuses.update', $kursus->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Kursus</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ $kursus->judul }}" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi Kursus</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ $kursus->deskripsi }}</textarea>
            </div>
            <div class="mb-3">
                <label for="durasi" class="form-label">Durasi Kursus (menit)</label>
                <input type="number" class="form-control" id="durasi" name="durasi" value="{{ $kursus->durasi }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('kursuses.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

@endsection
