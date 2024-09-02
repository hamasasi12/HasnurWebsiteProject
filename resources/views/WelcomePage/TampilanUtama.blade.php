@extends('master')

@section('content')

{{-- Header Section --}}
<header class="bg-primary text-white py-3">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h4 m-0">Course Management System</h1>
            <nav>
                <ul class="nav">
                    <li class="nav-item">
                        <a href="#home" class="nav-link text-white">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#courses" class="nav-link text-white">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a href="#profile" class="nav-link text-white">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="btn btn-light">Logout</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
{{-- Header Section End --}}

{{-- Main Content Section --}}
<main class="container-fluid mt-4">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Course Data: Click on a Course to Add Material</h6>
            <a href="{{ route('kursuses.create') }}" class="btn btn-rounded btn-primary">Add Course</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Duration (hours)</th>
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
</main>
{{-- Main Content Section End --}}

{{-- Footer Section --}}
<footer class="bg-dark text-white py-4">
    <div class="container text-center">
        <p>&copy; 2024 Course Management System. All Rights Reserved.</p>
        <p>
            <a href="#privacy" class="text-white">Privacy Policy</a> | 
            <a href="#terms" class="text-white">Terms of Service</a>
        </p>
    </div>
</footer>
{{-- Footer Section End --}}

{{-- SweetAlert2 and JavaScript Section --}}
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
                title: 'Are you sure?',
                text: 'Deleted data cannot be recovered',
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
