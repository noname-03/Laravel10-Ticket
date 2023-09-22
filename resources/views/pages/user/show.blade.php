@extends('layouts.app')
@section('title', 'Detail Data User')
@section('data.product', 'menu-open')
{{-- @section('ticket', 'active') --}}
@push('css')
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endpush
@section('content')
    <div class="content-wrapper" style="min-height: 1345.31px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Detail Data User</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section>


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Detail Data User</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="display: block;">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="" method="post">
                                    @csrf @method('put')
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Nama</label>
                                            <input type="text" class="form-control  @error('name') is-invalid @enderror"
                                                id="name" placeholder="Masukan Nama" name="name"
                                                value="{{ old('name', $user->name) }}" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control  @error('email') is-invalid @enderror"
                                                id="email" placeholder="Masukan Nama" name="email"
                                                value="{{ old('email', $user->email) }}" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="role">Status Akun</label>
                                            <input type="text" class="form-control  @error('role') is-invalid @enderror"
                                                id="role" placeholder="Masukan Nama" name="role"
                                                value="{{ old('role', $user->role) }}" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="balance">Saldo</label>
                                            <input type="text"
                                                class="form-control  @error('balance') is-invalid @enderror" id="balance"
                                                placeholder="Masukan Nama" name="balance"
                                                value="{{ $user->balance == null ? '0' : $user->balance->amount }}"
                                                readonly>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>

                <div class="callout callout-info">
                    <h5>Apakah anda ingin merubah akun anda menjadi: @if ($user->role == 'promotor')
                            <span class="badge badge-danger">User</span>
                        @else
                            <span class="badge badge-success">Promotor</span>
                        @endif
                    </h5>
                    <a href="{{ route('user.role', $user->id) }}" class="btn btn-primary active" role="button"
                        aria-pressed="true">Ubah
                        Akun</a>
                </div>

                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Menarik Saldo</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="display: block;">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('balance.decrease', $user->id) }}" method="post">
                                    @csrf @method('put')
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Nama</label>
                                            <input type="text" class="form-control  @error('name') is-invalid @enderror"
                                                id="name" placeholder="Masukan Nama" name="name"
                                                value="{{ old('name') }}">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="name_bank">Nama Bank</label>
                                            <input type="text"
                                                class="form-control  @error('name_bank') is-invalid @enderror"
                                                id="name_bank" placeholder="Masukan Nama" name="name_bank"
                                                value="{{ old('name_bank') }}">
                                            @error('name_bank')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="no_rek">No Rekening</label>
                                            <input type="number"
                                                class="form-control  @error('no_rek') is-invalid @enderror" id="no_rek"
                                                placeholder="Masukan Nama" name="no_rek" value="{{ old('no_rek') }}">
                                            @error('no_rek')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="amount">Jumlah</label>
                                            <input type="number"
                                                class="form-control  @error('amount') is-invalid @enderror" id="amount"
                                                placeholder="Masukan Nama" name="amount" value="{{ old('amount') }}">
                                            @error('amount')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Tarik Uang</button>
                                </form>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@push('script')
    <script src="{{ asset('admin/bs/dist/js/bootstrap-select.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('admin/bs/dist/css/bootstrap-select.css') }}">
    <!-- SweetAlert2 -->
    <script src="{{ asset('admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            @if (Session::has('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '{{ Session::get('success') }}',
                    timer: 3000,
                    showConfirmButton: false
                });
            @endif

            @if (Session::has('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: '{{ Session::get('error') }}',
                    timer: 3000,
                    showConfirmButton: false
                });
            @endif
        });
    </script>
@endpush
