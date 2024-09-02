@extends('master')

@section('content')

@section('main')
<div class="container mt-5">
    <h4>Edit Materi: <span class="text-primary">{{ $materi->judul }}</span></h4>

    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Form Edit Materi</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('materis.update', $materi->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Judul Field -->
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Materi</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $materi->judul) }}" required>
                    @error('judul')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Deskripsi Field -->
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi Materi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ old('deskripsi', $materi->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Link Field -->
                <div class="mb-3">
                    <label for="link" class="form-label">Link</label>
                    <input type="url" class="form-control" id="link" name="link" value="{{ old('link', $materi->link) }}" required>
                    @error('link')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Update Materi</button>
                <a href="{{ route('kursuses.show', $materi->kursus_id) }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection

<div class="header-container">

</div>
