@extends('master')

@section('content')

@section('main')

<div class="container-fluid mt-4">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Table Data Kursus: Click Kursus Yang Ingin Dimasukkan Materinya</h6>
            <a href="{{ route('kursuses.create') }}" class="btn btn-rounded btn-primary">Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Durasi (jam)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kursuses as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td><a href="{{ route('kursuses.show', $item->id) }}">{{ $item->judul }}</a></td>
                                <td>{{ $item->deskripsi }}</td>
                                <td>{{ $item->durasi }}</td>
                                <td>
                                    <a href="{{ route('kursuses.edit', $item->id) }}" class="btn btn-rounded btn-primary">Edit</a>
                                    <form action="{{ route('kursuses.destroy', $item->id) }}" method="POST" class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-rounded btn-danger delete-btn">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // SweetAlert2 for success messages
    @if(session('success'))
        Swal.fire({
            title: 'Success!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    @endif

    // SweetAlert2 for delete confirmation
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function() {
            const form = this.closest('.delete-form');

            Swal.fire({
                title: 'Apakah Kamu Yakin?',
                text: 'Data yang dihapus tidak bisa dikembalikan',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Delete!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>

@endsection
