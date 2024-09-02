@extends('master')

@section('content')

@section('main')
<h4>Tambah Kursus:</h4>
@if(session('success'))
<script>
    Swal.fire({
        title: 'Success!',
        text: '{{ session('success') }}',
        icon: 'success',
        confirmButtonText: 'OK'
    });
</script>
@endif

<div class="card shadow mb-4">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Form Tambah Kursus</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('kursuses.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Kursus</label>
                <input type="text" class="form-control" id="judul" name="judul" placeholder="Input Judul Kursus Anda" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi Kursus</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Input Deskripsi Lebih Lanjut Mengenai Kursus" required></textarea>
            </div>
            <div class="mb-3">
                <label for="embed_link" class="form-label">Durasi Kursus (menit)</label>
                <input type="number" class="form-control" id="embed_link" name="durasi" placeholder="Input Durasi" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('kursuses.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection
