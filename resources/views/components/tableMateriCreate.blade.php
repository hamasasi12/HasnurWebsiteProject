@extends('master')

@section('content')

@section('main')

<div class="container mt-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Add Materi to <span class="text-light">{{ $kursus->judul }}</span></h4>
        </div>
        <div class="card-body">
            <form action="{{ route('materis.store', $kursus->id) }}" method="POST">
                @csrf

                <!-- Judul Field -->
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul:</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}" required>
                    @error('judul')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Deskripsi Field -->
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi:</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required>{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Link Field -->
                <div class="mb-3">
                    <label for="link" class="form-label">Link:</label>
                    <input type="url" class="form-control" id="link" name="link" value="{{ old('link') }}" required>
                    @error('link')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <a href="{{ route('kursuses.show', $kursus->id) }}" class="btn btn-secondary me-2">Kembali</a>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
