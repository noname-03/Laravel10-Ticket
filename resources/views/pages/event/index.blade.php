@extends('layouts.app')
@section('title', 'Data Event')
@section('data.product', 'menu-open')
@section('event', 'active')
@push('css')
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endpush
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Event</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Event</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            @if (Auth::user()->role == 'promotor')
                                <div class="card-header">
                                    <a href="{{ route('event.create') }}" type="button" class="btn btn-primary btn-sm"><i
                                            class="fas fa-plus"></i> Tambah
                                        Data</a>
                                </div>
                            @else
                                {{-- button to dropdwon sort by tipe event --}}
                                <div class="card-header">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-filter"></i> Filter
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('event.index') }}">Semua</a>
                                            @foreach ($eventTypes as $item)
                                                <a class="dropdown-item"
                                                    href="{{ route('event.index', ['type' => $item->id]) }}">{{ $item->title }}</a>
                                            @endforeach
                                        </div>
                                        {{-- buatkan filter calender input date --}}
                                        <form action="{{ route('event.index') }}" method="get">
                                            <div class="input-group">
                                                <input type="date" class="form-control form-control-sm" name="date"
                                                    value="{{ request()->get('date') }}">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-primary btn-sm"><i
                                                            class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                            @endif
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example3" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 1%">No</th>
                                            <th>Nama</th>
                                            <th>Tanggal</th>
                                            <th style="width: 5%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($events as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->date }}</td>
                                                <td style="text-align: center;">
                                                    @if (Auth::user()->role == 'promotor')
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                            <a href="{{ route('event.edit', $item->id) }}"
                                                                class="btn btn-sm btn-outline-secondary">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a href="{{ route('event.show', $item->id) }}"
                                                                class="btn btn-sm btn-outline-primary">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                            <button type="submit"
                                                                onclick="confirmDelete('{{ route('event.destroy', $item->id) }}')"
                                                                class="btn btn-sm btn-outline-danger delete-button">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                        {{-- </form> --}}
                                                    @else
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                            <a href="{{ route('event.show', $item->id) }}"
                                                                class="btn btn-sm btn-outline-primary">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@push('script')
    <!-- Page specific script -->

    <!-- SweetAlert2 -->
    <script src="{{ asset('admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        $(function() {
            // Check if there's a success message in the session
            @if (Session::has('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '{{ Session::get('success') }}',
                    timer: 1000, // Adjust the duration in milliseconds (e.g., 3000ms = 3 seconds)
                    showConfirmButton: false, // This will hide the "OK" button
                });
            @endif

            $("#example3").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>
    <script>
        function confirmDelete(deleteUrl) {
            Swal.fire({
                title: 'Apakah kamu yakin akan menghapus ini?',
                text: 'Anda tidak akan dapat mengembalikan data ini!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus Ini!',
                cancelButtonText: 'Tidak, Batal' // Custom "Cancel" button text,
            }).then((result) => {
                if (result.isConfirmed) {
                    // If the user confirms, send the delete request
                    $.ajax({
                        url: deleteUrl,
                        type: 'POST',
                        data: {
                            "_method": "DELETE", // Laravel method spoofing
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            // Handle success, e.g., remove the row from the table
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response
                                    .message, // Use the message from the JSON response
                                timer: 1000,
                                showConfirmButton: false,
                            }).then((result) => {
                                location.reload();
                            });
                        },
                        error: function(xhr) {
                            // Handle error, e.g., show an error message
                            Swal.fire(
                                'Error!',
                                'An error occurred while deleting the category.',
                                'error'
                            );
                        }
                    });
                }
            });
        }
    </script>
@endpush
